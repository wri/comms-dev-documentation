Technical Requirements for New WRI Web Properties
=================================================

World Resources Institute Digital Communications Team 

[ add in: retain base content types, gdpr, gtm, guidelines on social sharing modules ] 

[ add in testing requirements: PHPUnit, WCAG AA, cross-browser testing, min browser version support, no deprecated code, no php or console errors/warnings ] 

[ add in performance: Google Lighthouse score minimum 60-70) 

New Drupal Instance 

-   New Digital Property Requirements 

    -   Domain name policy 

    -   Lifecycle plan 

    -   Maintenance plan 

    -   Designated content manager 

    -   Open source (MIT license) for all custom code, available as public repositories  

-   Technical Requirements 

-   Drupal 8, preferably with Drupal front-end 

-   All traffic over SSL 

-   Analytics/GTM (using WRI Comms' GA account) 

-   W3C AA accessibility 

-   Drupal best practices (code standards): <https://www.drupal.org/docs/develop/>  

-   GDPR compliance: privacy policy and cookie use notice 

-   SASS/SCSS or straight CSS 

-   Documentation: 

-   Technical documentation for all custom functionality 

-   Site admin documentation for content editors and site managers 

-   Preferences 

-   Hosted on Pantheon in the WRI account 

-   If not we will need access to the code repository 

-   If not: global CDN for caching 

-   Open source webfonts (i.e. not Typekit) 

-   Blog syndication via JSON 

-   Drupal theme and site building: 

-   Mobile First design approach 

-   Atomic design principles 

-   If using a front-end framework: Bootstrap 4 

-   Drupal Layout Builder 

-   Drupal modules: 

-   Limit community modules to bare minimum. Do include the following: 

-   Drupal Layout Builder (part of Drupal 8.7 available as of May 2019 <https://www.drupal.org/core/experimental> -- see also <https://dri.es/why-drupal-layout-builder-is-so-unique-and-powerful>) 

-   Redirect <https://www.drupal.org/project/redirect> 

-   Google Tag Manager <https://www.drupal.org/project/google_tag> 

-   Style Guide [https://www.drupal.org/project/styleguide\
    ](https://www.drupal.org/project/styleguide)  

-   Where possible, use existing tools (Views or the Context module) and theme templates before writing custom modules for functionality 

-   Mobile First approach to design and layout. This helps narrow the focus to the essentials, which aids the overall design even in wider/desktop views
