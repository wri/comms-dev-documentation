Apps hosted on the wri.org server but not integrated into Drupal: 

Self-Contained App 

Makes calls to external APIs as needed 

No server requirements/dependencies, runs as html/js/css ("free standing") 

Styled as static pages as html/js/css 

Pages are called from the file directory (i.e. wri.org/applications/the/app/directory/index.html)  

Our server environment is PHP 7.2 hosted in Pantheon and can’t be customized 

App Server (optional for apps that have server requirements/dependencies) 

Uses external APIs as needed (i.e. ResourceWatch API) 

Runs in a separate environment (own server) 

Runs necessary functions 

Rudimentary API to generate data/content for the front end 

 
