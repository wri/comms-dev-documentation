Privacy Consent Management: GDPR Compliance
-------------------------------------------

WRI web properties need to comply with privacy laws like the EU General Data Protection Regulation (GDPR), the California Consumer Privacy Act (CCPA), and Brazil's Lei Geral de Proteção de Dados (LGPD).

WRI Comms uses Osano's Consent Management tool for this (https://www.osano.com/products/consent-management). 

Links to the Privacy Policy and the Osano Cookie Management drawer need to appear in the footer. 

Osano Script
------------
WRI Comms will add the Osano script to the site using Google Tag Manager (GTM).

If you're not using GTM, or if your GTM account isn't managed by WRI Comms, you can add the script manually. The script should load on the page before any scripts for analytics, marketing, or other tracking. It will look like this:
```
<script src="https://cmp.osano.com/xxxxxxxxxxxx/osano.js?variant=five"></script>
``` 

Privacy Policy
--------------

A Privacy Policy is required for all of our sites, linked in the footer. The path should be /privacy-policy or /about/privacy-policy (and should NOT include 'GDPR' or other terms that are specific to certain laws).

wri.org Privacy Policy: https://www.wri.org/about/privacy-policy for reference

Cookie Preferences Drawer Link
------------------------------

A "Cookie Preferences" link allows the user to open the Osano Cookie Management drawer if they need to check or change their preferences. It's required for all of our sites, and should be linked in the footer.

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
Hide the "Do Not Sell" option in the drawer:
```
li.osano-cm-drawer-item:nth-child(5) { display: none; }
```

Google Analytics Consent Mode
-----------------------------

To use Google Analytcs Consent Mode (https://developers.google.com/tag-platform/devguides/privacy#consent_mode), load this script at the top of the page (before Analytics or Osano scripts). Consent Mode will need to be enabled in Google Analytics and in the Osano dashboard.

```
<script>
  window.dataLayer = window.dataLayer ||[];
  function gtag(){dataLayer.push(arguments);}
  gtag('consent','default',{
    'ad_storage':'denied',
    'analytics_storage':'denied',
    'wait_for_update': 500
  });
  gtag("set", "ads_data_redaction", true);
</script>
 ```
