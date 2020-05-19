# Self Contained JS Apps Hosted on Pantheon but Not Integrated into Drupal

A solution for data visualizations and interctive graphics to be used as embedded content (iframe). These are a set of self-contained files running as html/js/css without server requirements or dependencies. 

## Requirements

Regardless of how the app is compiled, the production build needs to be a set of static files (html/js/css) with no server requirements or dependencies. Any external libraries can be pulled in via cdn or included in the codebase. 

Essentially, the app needs to be flat files that can be iframed into content elsewhere.

Pages are called from the file directory (i.e. wri.org/applications/the/app/directory/index.html)  

## Testing

Multiplatform testing using Browserstack or similar tools. Final code test should be on the Pantheon "multidev" instance to ensure full compatibility with our production environment. WRI will merge to the Pantheon environment for testing, and make all deployments. 
