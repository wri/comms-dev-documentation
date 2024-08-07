Privacy Consent Management: GDPR Compliance
-------------------------------------------

WRI web properties need to comply with privacy laws like the EU General Data Protection Regulation (GDPR), the California Consumer Privacy Act (CCPA), and Brazil's Lei Geral de Proteção de Dados (LGPD).

WRI Comms uses Osano's Consent Management tool for this (https://www.osano.com/products/consent-management). 

Links to the Privacy Policy and the Osano Cookie Management drawer need to appear in the footer. 


Osano Script
------------
The script should load on the page before any scripts for analytics, marketing, or other tracking. 

WRI Comms will provide the script. It will look like this (and will sometimes include parameters):
```
<script src="https://cmp.osano.com/xxxxxxxxxxxx/osano.js"></script>
``` 
Note that in some cases WRI Comms will prefer to add the Osano script to the site using Google Tag Manager (GTM).


Google Analytics Consent Mode
-----------------------------

WRI Comms is configuring Osano with Google Analytcs Consent Mode enabled (https://developers.google.com/tag-platform/devguides/privacy#consent_mode).

NOTE: WRI Comms will needs to enable Consent Mode in Google Analytics and in the Osano dashboard. By itself this script will prevent Analytics from tracking effectively. In addition these 4 scripts from Google need to be categorized as "essential" in the Osano script manager when using Consent Mode: "google-analytics\.com", "googletagmanager\.com", "google\.com", and "googleapis\.com".

Load this script at the top of the page (before Analytics or Osano scripts). Check https://developers.google.com/tag-platform/security/guides/consent?consentmode=advanced to ensure this is the latest script from Google.

```
<script>
  window.dataLayer = window.dataLayer ||[];
  function gtag(){dataLayer.push(arguments);}
  gtag('consent','default',{
    'ad_storage':'denied',
    'analytics_storage':'denied',
    'ad_user_data':'denied',
    'ad_personalization':'denied',
    'personalization_storage':'denied',
    'functionality_storage':'granted',
    'security_storage':'granted',
    'wait_for_update': 500
  });
  gtag("set", "ads_data_redaction", true);
</script>
 ```

Privacy Policy
--------------

A Privacy Policy is required for all of our sites, linked in the footer. The path should be /privacy-policy or /about/privacy-policy (and should NOT include 'GDPR' or other terms that are specific to certain laws).

wri.org Privacy Policy: https://www.wri.org/about/privacy-policy for reference

For sites that comply with the WRI privacy policy on wri.org: you can link to wri.org and pass parameters to identify your site, and pull the relevant cookie list. WRI Comms can configure this within Osano, and provide the url for any footer/utility links on the site that need it. The url follows this pattern: https://www.wri.org/about/privacy-policy?sitename=[the-site-name]&osanoid=[xxxxxxxxxxxx]


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

Hide Unused Elements
--------------------

Remove the "powered by Osano" text at the bottom of the drawer: 
```
.osano-cm-powered-by {display: none;}
```
Hide the "cookie" icon that appears in the bottom right (this assumes you've enabled the Cookie Preference Drawer link): 
```
.osano-cm-widget { display: none; } 
```
Hide the "Do Not Sell" option in the drawer:
```
li.osano-cm-drawer-item:nth-child(5) { display: none; }
```


