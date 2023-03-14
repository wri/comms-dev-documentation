Privacy Consent (GDPR)
----------------------
WRI Comms uses Osano https://www.osano.com/ to manage privacy on our sites. Our team can provide the script to include the consent management tool on the site.

Links to the Privacy Policy and the Osano Cookie Management drawer need to appear in the footer.  

Privacy Policy
--------------

A Privacy Policy is required for all of our sites, linked in the footer.

For institutional sites: request guidance from WRI's digital team. 

wri.org Privacy Policy: https://www.wri.org/about/privacy-policy for reference

Cookie Management Drawer Link
-----------------------------

Use the following script:
```
<script>
  var elements = document.getElementsByClassName("osano-cookie-preference-link");

  var showOsanaDialog = function(e) {
    e.preventDefault();
	  Osano.cm.showDrawer('osano-cm-dom-info-dialog-open');
  };

  for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', showOsanaDialog, false);
  }  
</script>
```

Then set the link with the 'osano-cookie-preference-link':

 ```
<a href="" class="osano-cookie-preference-link" title="Manage privacy and cookie preferences">Cookie Preferences</a>
 ```

Remove the "powered by Osano" text at the bottom of the drawer: 
```
.osano-cm-powered-by {display: none;}
```
Hide the "cookie" icon that appears in the bottom right: 
```
.osano-cm-widget { display: none; } 
```
.osano-cm-powered-by {display: none;}
