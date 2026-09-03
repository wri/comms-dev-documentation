# claude/

Shared [Claude Code](https://docs.claude.com/en/docs/claude-code) skills for the WRI Comms Digital Team. These are non-project-specific — invoke them from any repo you're working in, not just this one.

## Using a skill from here

Claude Code loads personal skills from `~/.claude/skills/`. To use a skill from this repo, clone it and symlink the skill in:

```bash
git clone git@github.com:wri/comms-dev-documentation.git ~/comms-dev-documentation
ln -s ~/comms-dev-documentation/claude/skills/drupal-security-check ~/.claude/skills/drupal-security-check
```

Repeat the `ln -s` for each skill you want available. Once symlinked, invoke it in any Claude Code session with `/drupal-security-check` (or whatever the skill's name is).

To pick up updates, `git pull` in `~/comms-dev-documentation` — the symlink means changes are live immediately, no reinstall needed.

## Available skills

| Skill | Command | Description |
|---|---|---|
| [drupal-security-check](skills/drupal-security-check/SKILL.md) | `/drupal-security-check` | Scans a Drupal codebase (assumes Pantheon hosting) for common vulnerability classes: outdated contrib modules with known SAs, insecure custom code patterns, exposed secrets, misconfigured access/permissions. |

## Adding a new skill

1. Create `claude/skills/<skill-name>/SKILL.md` (see existing skills for the format, or use Claude's `skill-creator` skill to scaffold one).
2. Add a row to the table above.
3. Open a PR.
