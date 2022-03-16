Technical Requirements for New WRI Web Properties
=================================================

March 2022 World Resources Institute Digital Communications Team

WRI Digital Team will provide a QA checklist for the project in addition to these guidelines. You can preview it here: https://docs.google.com/spreadsheets/d/1tn4Y968z4s7h_fv8A9ydWOup7rsiAPlNABzqlgZZCf8/edit?usp=sharing 

These are the technical requirements and guidelines and don't cover content strategy, branding, or design (beyond a preference for 'mobile first').   

New Drupal Instance
-------------------

-   New Digital Property Requirements 

    -   Domains: new domains and subdomains are managed by the Digital Team. Domain names should comply with our domain naming guidelines. 

    -   Lifecycle plan: new properties should include a strategy for the lifespan and eventual sunset of the site.

    -   Maintenance plan: new properties need to include a plan for continued maintenance and support after launch. This includes planning for major version upgrades of Drupal (i.e. Drupal 9->10)

    -   Designated content manager: new properties need to include a designated content manager within the WRI program or center.

    -   Open source (MIT license) for all custom code. The codebase may be available as public repositories, do not include credentials within the codebase. 

-   Technical Requirements 

    -   Drupal 9/10 with Drupal front-end 

    -   All traffic over SSL 

    -   Analytics/GTM (using WRI Comms' GA account) 

    -   W3C AA accessibility 

    -   Drupal best practices (code standards): <https://www.drupal.org/docs/develop/>  | Installing Code-Sniffer: https://www.drupal.org/docs/contributed-modules/code-review-module/installing-coder-sniffer

    -   GDPR notice

    -   Documentation to be provided: 

        -   Technical documentation for all custom functionality 

        -   Site admin documentation for content editors and site managers 
      
    -   Browser Compatibility: sites should render consistently across modern browsers (Chrome, Firefox, Safari, Edge) in both desktop and mobile versions. We also require support for IE 11. 
    
    -   Testing
    
        -   Cross-browser testing to ensure compatibility (i.e. BrowserStack).
        
        -   Tests for deprecated code, warnings, and console errors.
        
        -   Performance testing for desktop and mobile: we require a minumum Lighthouse score of 80 in both. We recommend a mobile-first approach during the design and build to ensure the best mobile performance. 
        
        -   Accessibility: we require W3C AA compliance.

-   Server and Site Security

    -   Server Security
    
        - SSH access needs to be key or token based (no passwords)
        
        - Maintenance plans should include routine monthly (or automated) security updates for the server OS and packages.
    
    -   Site Security
    
        - All traffic to the site should be forced over https (port 443) and have a valid SSL certificate. This includes any development environments that are accessible to the public.
    
        - No Anonymous user accounts: site accounts can only be created by site admins, and no accounts can be created anonymously (no self-creation of new accounts). 
        
        - Commenting tools and forums should be disabled.
        
        - PHP filter should be disabled.
        
        - Password requirements: strong passwords should be generated for all accounts. 
        
        - Maintenance plans should include routine monthly patches for any available security and maintenance releases.
        
        - Open source (MIT license) for all custom code: the codebase may be available as public repositories, do not include credentials within the codebase. 
        - 
    -   Pantheon Hosting
     
        - Drupal sites should be hosted in Pantheon under the WRI account.
         
        - Pantheon upstream should be used for Drupal Core. 

-   Preferences 

    -   Drupal and WordPress sites should be hosted on Pantheon with the WRI account. Other properties and tools should be hosted on AWS with the WRI Comms account. 

        -   For exceptions to our prefered hosting solution we will need access to the code repository.

        -   Sites hosted outside of Pantheon may require a global CDN for caching and global performance. 
        
    -   Drupal theme and site building: 

        -   Mobile First design approach: we prefer a 'mobile first' design approach to ensure an effective mobile experience and help inform the tablet and desktop UX.

        -   Atomic design principles: we prefer atomic design principles for the design elements and styleguide.
        
        -   Open source webfonts (i.e. not Typekit): Unless proprietary fonts are required by the brand or existing styleguide, use open source webfonts.

        -   Drupal Layout Builder: use Layout Builder for layout and content cusotmization.
        
        -   Retain Drupal's base content types: create new content types as needed, but retain the base content types for standardization and future planning.

    -   Users and Comments: disable comments across all content types, disable anonymous user account requests
    
    -   Drupal modules: 

        -   Limit community modules to bare minimum. Do include the following: 

            -   Drupal Layout Builder preferred (<https://dri.es/why-drupal-layout-builder-is-so-unique-and-powerful>) (note that as of Drupal 8.9 Layout Builder is not fully compatible with multilingual support) 

            -   Redirect <https://www.drupal.org/project/redirect> 

            -   Google Tag Manager <https://www.drupal.org/project/google_tag> 

            -   Unless you are providing your own style guide, include the Style Guide module [https://www.drupal.org/project/styleguide\
    ](https://www.drupal.org/project/styleguide)  

        -   Where possible, use existing tools (Views or the Context module) and theme templates before writing custom modules for functionality 

        -   Mobile First approach to design and layout. This helps narrow the focus to the essentials, which aids the overall design even in wider/desktop views
