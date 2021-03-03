# Self Contained JS Apps Hosted On Pantheon But Not Integrated Into Drupal

A solution for data visualizations and interactive graphics to be used as free standing apps or embedded content (iframe). The apps are built/compiled as a set of self-contained files running as html/js/css without server requirements or dependencies. 

## Requirements

Regardless of how the app is compiled, the production build needs to be a set of static files (html/js/css) with no server requirements or dependencies. Any external libraries can be pulled in via cdn or included in the codebase. 

Essentially, the app needs to be flat files that can either run within a directory on the server, or be iframed into content elsewhere, depending on the requirements for the project.

The files are called from the file directory (i.e. wri.org/applications/the/app/directory/index.html) and all assets and resources (js, css, and files) need to pull from within that directory and not the site root.

## Testing

Multiplatform testing using Browserstack or similar tools. Final code test should be on the Pantheon "multidev" instance to ensure full compatibility with our production environment. WRI will merge to the Pantheon environment for testing, and make all deployments. 
