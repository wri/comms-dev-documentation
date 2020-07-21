Guidelines for Microsites on WRI.org
====================================

(draft July 2020) 

[ add in notes on: no sitewide logic in custom modules, and point to main vendor guidelines doc for other aspects, including testing requirements ] 

What is a Microsite?
--------------------

Microsites are a collection of pages and views that have their own design, menus and navigation, distinct from the rest of the site.  

There are limits to the customized experience: when the user follows a link to a page on the main site, they will see content that uses the site's master theme. See below under "Views" for a solution when you need content from the main site to be displayed on a page with the microsite's theme. 

Building it in Drupal
---------------------

-   Currently these projects are built in Drupal 7 using ThemeKey along with Context and Views. 

-   Everything with the microsite's root path (i.e. wri.org/microsite/*) has the microsite's theme applied instead of the site's master theme. 

-   Theme: the Drupal theme can be built with either a subtheme of the site's master theme or an independent theme. You can control the page layout and functionality in the page template files (or template.php) of your theme without interfering with the main site.\
    For consistency of the user experience across our site please use the following breakpoints: 

max 991: menu collapses to hamburger (with some items remaining)\
max 815: sidebars stack\
max 599: menu fully collapses to hamburger\
max 527: content images break out to 100% width 

Layout and functionality can be set in the theme template.php and tpl files. You can also use Views and Context. 

Webfonts: we encourage the use of opensource webfonts, but you can also use the site's existing Typekit fonts. 

-   Modules: Theming is applied based on rules in ThemeKey. We use Features to deploy configuration changes across environments (i.e. Views, Context settings). Any custom functionality for the microsite should use existing tools (Views, Context), or be processed in the theme files. WRI Comms will need to review any custom modules and test to ensure it doesn't interfere with current functionality. 

-   Views: Views can be used to create separately themed versions of content that exists elsewhere on the site. Example: blog posts for the main site that are relevant to the microsite could be displayed inside a view that uses the microsite's theme, instead of the standard view on the main site that uses the site's master theme. 

-   Content types and taxonomy: we prefer for you to use our existing content types. Depending on what you need to build, we will work with you to ensure the microsite's content doesn't interfere with the main site content. We can also work with you to create taxonomy vocabularies or add fields to existing content types if necessary. 

-   Site files: files for site content should be set to save within a subdirectory, named to match the microsite (i.e. files/agriculture/ for a microsite "Micro Agriculture in Developing Economies")

-   PHP 7.2+ 

-   We use a continuous integration environment. We will be deploying maintenance and security patches as well as other changes to the site while your work is in progress. We recommend you rebase your branch before requesting a merge into Master. You can use the Pantheon dashboard to merge upstream changes, as well as making backups of your "multidev" environment. 

Development Process:
--------------------

The Digital team will create a working branch of the site's codebase and spin up a live instance of the site based on that branch (we use Pantheon).  

All of your work can be previewed there, and we can backport the latest content from the production site whenever you need.  

When it's ready to deploy, we will merge it into the Master branch and test it with you on our Dev environment.  

Guidelines:
-----------

We recommend a "mobile first" approach to layout and design. This helps narrow the focus to the essentials, which often helps the overall design even in wider or desktop views.
