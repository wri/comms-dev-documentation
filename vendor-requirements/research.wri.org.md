Research Server (for custom long-form reports and publications) research.wri.org
================================================================================

[ July 2020: this needs ot be re-written now that the original WRR Food site is live and add in what we learned from the GFR microsite challenges -- and inlcude non-wri.org specific parts of the guidelines for microsites on wri.org ]
 
Technical requirements and guidelines, documentation on the new “pubs” server (currently used for WRR Food and GFR) -- note the user docs are stored in the One Drive folder for content editors 

GFR – Technical Requirements for RFP 
------------------------------------

Development: We anticipate development being one of the larger areas of work in this effort. Not only does the GFU need to be built in a way that is responsive and performance-minded across devices, it needs to be integrated into an *existing* Drupal 8 environment (i.e., wrr-food.wri.org). This Drupal instance is intended to house select reports and publications from WRI, each with its own Drupal theme and requirements. The GFU will be the second such report and will require its own Drupal theme that will be applied to all content within a defined path (e.g., /global-forest-update/etc). Site customizations need to be limited to the theming layer or otherwise applied only to the content of the GFU, not site-wide. WRI has in-house Drupal development expertise that can advise and assist in this process. WRI will provide access to the environment and a dev instance on Pantheon (our standard host), as well as guidelines for creating "microsites" within the existing site. Preference will be given to vendors who are familiar & comfortable with working in this mode and are well-versed in Drupal. 

WRR Food – Technical Requirements for RFP
-----------------------------------------
 
### Overview 

A Drupal 8 site with multliple themes using the theme negotiator. Vendor will provide a single Drupal 8 theme that is used to style the content for the WRR Food Report. WRI will provide the server environment (Pantheon) and access. 


### Requirements 

Page layout and design: use Layout Builder, Views and theme template files to control page layout. This site will be used for additional content in the future and needs to be built in as straightforward and manageable way as possible.  

Content type: a new content type named “publications”. WRI will provide information on fields, field names and other requirements. 

Theme control: WRI will provide an “empty” Drupal 8 instance with the following functionality: 

> Custom Drupal 8 theme negotiator: the landing page and all content required for the site will have a path of “/world-resources-report" and “/world-resources-report/*”. The theme negotiator will assign your theme to that content, and all other paths will be themed separately by WRI. 

Feed aggregation: titles and teasers from external content (rss feeds from wri.org) to be displayed as blocks within the site content.  

Modules: please include Google Analytics, Google Tag Manager, and Style Guide. Please keep module use to a minimum, and run any custom functionality within the theme files. 

 

 
