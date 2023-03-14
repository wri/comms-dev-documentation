Privacy Consent Management: GDPR Compliance
-------------------------------------------

WRI web properties need to comply with privacy laws like the EU General Data Protection Regulation (GDPR), the California Consumer Privacy Act (CCPA), and Brazil's Lei Geral de Proteção de Dados (LGPD).

WRI Comms uses Osano's Consent Management tool for this (https://www.osano.com/products/consent-management). 

Osano Script
------------
WRI Comms will provide the script to include the consent management tool on the site.

The script should load on the page before any scripts for analytics, marketing, or other tracking. It will look like this:
```
<script src="https://cmp.osano.com/AzyfddTRtqi1560Dk/xxxxxxxxxxxx/osano.js?variant=five"></script>
```

Links to the Privacy Policy and the Osano Cookie Management drawer need to appear in the footer.  

Privacy Policy
--------------

A Privacy Policy is required for all of our sites, linked in the footer. The path should be /privacy-policy or /about/privacy/policy.

wri.org Privacy Policy: https://www.wri.org/about/privacy-policy for reference

Cookie Preferences Drawer Link
------------------------------

A "Cookie Preferences" link allows the user to open the Osano Cookie Management drawer if they need to check or change their ppreferences. It's required for all of our sites, and should be linked in the footer.

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
