---
name: drupal-security-check
description: Audits a Drupal codebase hosted on Pantheon for security vulnerabilities — outdated modules with known CVEs, risky patterns in custom code (SQL injection, unescaped output, missing access checks, unsafe file uploads), leaked secrets, and Pantheon/hosting misconfigurations. Use this whenever the user asks for a security review, security audit, vulnerability scan, or "check for security issues" on a Drupal site, or before a release/deploy when they want a security sanity check. Also trigger if they mention SA-CORE/SA-CONTRIB advisories, `pm:security`, or ask "is this safe to ship" for a Drupal project. This is a read-only audit — it never modifies code, only reports findings.
---

# Drupal Security Check

Audit a Drupal codebase for security issues and produce a findings report. This skill assumes Drupal running on Pantheon, with DDEV for local development and Terminus for remote operations — the same conventions used across WRI's Drupal projects. It does not assume any particular site name; detect that from context (see Setup).

This is a **read-only audit**. Report what you find — do not edit code, run `drush cex`, or otherwise change project state. If the user wants fixes applied, that's a separate follow-up they can ask for explicitly once they've seen the report.

## Why this shape

Drupal security issues cluster into a few genuinely different categories — a stale contrib module is a different kind of risk than a custom form missing an access check, and neither is caught by the same method. Rather than one big grep pass, work through the sections below roughly in order: the CVE check first because it's cheap and deterministic, then custom code (where an LLM's judgment actually adds value beyond what a scanner would catch), then config/secrets and hosting posture. Skipping straight to grepping for regexes without this structure tends to produce noisy, hard-to-prioritize output.

## Setup: detect the environment

Before starting, figure out what you're working with:

- **Site name**: look for `pantheon.yml` (has a site name context implicitly via Terminus config) or `.ddev/config.yaml` (has a `name:` field) at the project root. If a project `CLAUDE.md` documents the site name/commands, use that.
- **Docroot**: usually `web/`, but confirm via `.ddev/config.yaml` (`docroot:`) or `composer.json`.
- **Local environment**: check if DDEV is running with `ddev describe` (or `ddev status` if unsure). If it's stopped, you can still do the static checks below without starting it — starting a whole environment just for a read-only audit isn't necessary unless you need `pm:security` and no remote alternative works.
- **Remote environment**: if Terminus is configured (`terminus site:list` succeeds) and you know the site name, `terminus drush <site>.<env> -- ...` works even without a local DDEV instance running.

If neither DDEV nor Terminus is usable, that's fine — skip step 1 below (note it as skipped in the report) and rely on the static code/config checks, which need only filesystem access.

## Step 1: Known-CVE modules

This is deterministic — don't try to reason about module versions yourself, just ask Drupal:

```bash
ddev drush pm:security
```

or, if there's no local environment but Terminus is available:

```bash
terminus drush <site>.<env> -- pm:security
```

Use whichever environment is actually reachable; prefer local since it doesn't touch a live site. If both are unavailable, note in the report that this check was skipped and why, so the user knows the report is incomplete rather than assuming a clean bill of health.

Every module this returns is a **Critical or High** finding depending on the advisory's own severity rating (Drupal security advisories are themselves rated — carry that rating through rather than re-deriving your own).

## Step 2: Custom code review

Scope this to custom code only — `web/modules/custom/` and `web/themes/custom/` (adjust paths if the docroot detected in Setup differs). Contrib and core modules are covered by Step 1; re-reviewing their source is out of scope and mostly wasted effort since they're maintained upstream.

Read through the custom modules/themes and look for these patterns. For each, the concern isn't "does this string appear" but "is user-controllable input reaching a dangerous sink without being handled safely" — so read enough surrounding context to tell real findings from safe uses of the same API.

- **SQL injection**: raw string concatenation or interpolation building a query (`db_query("... $var ...")`, `->query("... " . $input)`) instead of placeholders (`:placeholder` args) or the Query Builder. Drupal's APIs make this rare in well-written code, so treat any hand-built SQL string touching user input as worth flagging.
- **Unescaped output**: `#markup` or `Markup::create()` wrapping a variable that traces back to user input (form values, URL args, request data) without `Html::escape()`, `Xss::filter()`, or equivalent. Also check for `{{ content|raw }}` or `|raw` filters in custom Twig templates — that's Drupal's autoescaping being deliberately turned off, which is fine for trusted/static content but a real risk if the value includes user input.
- **Access control gaps**: routes in `*.routing.yml` without a `requirements: _permission` or `_access`/`_custom_access` entry; forms or controllers that skip `\Drupal::currentUser()->hasPermission()` checks before performing privileged actions; entity access hooks (`hook_entity_access`, `hook_node_access`) that return `AccessResult::allowed()` too broadly.
- **CSRF**: state-changing operations (delete, publish, config change) reachable via a plain GET route without a CSRF token (`_csrf_token: 'TRUE'` in routing, or Form API's built-in protection being bypassed via a custom non-Form-API endpoint).
- **Unsafe file uploads**: file-upload fields or `\Drupal::service('file_system')` usage without extension allowlists, or that trust a client-supplied MIME type/filename without validation.
- **Dangerous functions on user input**: `eval()`, `unserialize()` (use `Serialization\Json` or safe alternatives instead — unserializing user input is a known PHP object-injection vector), `system()`/`exec()`/`shell_exec()` built from request data.

For each finding, note the file and line number so it's directly actionable.

## Step 3: Secrets and config hygiene

- Search `web/sites/*/settings*.php` for hardcoded credentials, API keys, or tokens (database credentials belong in `settings.php` by Drupal convention and aren't themselves a finding — but third-party API keys, SendGrid/service tokens, etc. hardcoded as literal strings are). These should come from environment variables or the Key module instead.
- If a `config_ignore.settings.yml` or similar exists, sanity-check that anything genuinely sensitive (API keys stored in config, service credentials) is actually excluded — misconfigured `config_ignore` can mean secrets get exported into version control instead of being protected.
- Grep the settings files and any committed `.env`-style files for common secret-shaped patterns (long hex/base64 strings assigned to keys with names like `_key`, `_secret`, `_token`, `_password`) as a backstop, but read the match in context — a config key name containing "secret" isn't itself a leak if the value is a reference, not a literal.

## Step 4: Pantheon/hosting posture

- **`.htaccess`**: check for overly permissive rules — anything that re-enables directory listing, disables the default deny-by-default on `sites/*/files/php` execution, or removes protections Drupal ships by default.
- **`pantheon.yml`**: check for anything unusual, but per this skill's read-only scope, only report — never suggest or make edits here without the user explicitly asking, since it controls hosting behavior.
- **Shield (or equivalent HTTP auth) on non-prod environments**: confirm the Shield module (or Pantheon's built-in equivalent) is configured so Dev/Test environments aren't publicly indexable/accessible. If you can't determine this from code alone (it's often set via UI/env-specific config), note it as something to verify manually rather than guessing.
- **Debug/dev settings that could leak into production**: check `settings.php` and environment-specific settings files for `error_level` set to display errors, Devel module enabled outside a dev-only conditional, or `$config['system.logging']['error_level']` set to verbose in a way that isn't gated to non-prod environments.

## Step 5: Access control spot-check

In custom modules, review `*.permissions.yml` and `*.routing.yml` together:

- Permissions defined with an empty or missing `restrict access: true` for anything administrative.
- Routes whose `_permission` is broader than the action needs (e.g., gating a narrow admin action behind `access content` instead of a dedicated permission).

This is a spot-check, not exhaustive enumeration — focus on routes/permissions that look administrative, destructive, or data-exposing; skip routine content-display routes.

## Report format

Structure the output as a findings report grouped by severity, most severe first. Use this template:

```markdown
# Drupal Security Audit — <site name or "site" if undetermined>

## Summary
<1-3 sentences: overall posture, count of findings per severity, anything skipped and why (e.g., "pm:security check skipped — no reachable DDEV or Terminus environment")>

## Critical
### <short title>
- **Location:** `path/to/file.php:42`
- **Issue:** <what's wrong>
- **Fix:** <concrete recommendation>

## High
(same structure)

## Medium
(same structure)

## Low
(same structure)
```

Omit severity sections with no findings rather than printing empty headers. If the audit found nothing in a category (e.g., no custom code issues), it's worth a one-line note in the summary rather than silence, so the user knows that area was actually checked.

Assign severity by real-world impact, not by category:
- **Critical**: remotely exploitable without authentication (SQL injection, unauthenticated RCE-shaped bugs, publicly exposed secrets).
- **High**: exploitable by an authenticated low-privilege user, or a known-CVE module rated Critical/High by its own SA.
- **Medium**: requires unusual conditions to exploit, or is a hardening gap rather than a live hole (e.g., missing CSRF token on a low-impact action, verbose error display on a non-prod environment).
- **Low**: best-practice deviations with minimal real-world risk on their own.
