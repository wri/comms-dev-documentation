Drupal 7
--------

Custom module for Drupal 7 sites: <https://github.com/wri/module-gdpr_notice> 

WordPress and other sites
-------------------------

The simplest implementation of GDPR that meets our current requirements is to drop this js solution into the WordPress theme: <https://github.com/AOEpeople/cookie-notice> via 

<script type="text/javscript" src="path/to/the/file/cookie.notice.js"></script>.  

Please use the following language: 

"This website uses cookies to provide you with an improved user experience. By continuing to browse this site, you consent to the use of cookies and similar technologies. For further details please visit our privacy policy." 

Please link the privacy policy to a page on the WordPress site and embed this iframe with our latest policy: 

<iframe frameborder="0" height="2800px" scrolling="yes" src="https://www.wri.org/upload/privacy-policy.html" width="100%"></iframe> 

We see this as a "light lift" needing minimal development time on the front end followed by brief testing.
