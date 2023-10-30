# Adjustments to Osano Behavior and Styling

[WRI Platform: add this via JS Asset Injector]

// this script is maintained at https://github.com/wri/comms-dev-documentation/edit/main/process/osano-styling.md

var elements = document.getElementsByClassName("osano-cookie-preference-link");

var showOsanaDialog = function(e) { e.preventDefault(); Osano.cm.showDrawer('osano-cm-dom-info-dialog-open'); };

for (var i = 0; i < elements.length; i++) { elements[i].addEventListener('click', showOsanaDialog, false); }

var styles = ".osano-cm-widget { display: none; } .osano-cm-powered-by {display: none;} .osano-cm-window {font-family:'acumin-pro-semi-condensed',sans-serif;} button.osano-cm-button {font-family:'acumin-pro-semi-condensed',sans-serif; font-size: 1rem; line-height: 1.23077; padding: 12px 20px; font-weight: normal; margin: .125em .25em .125em 0px;} .osano-cm-description .osano-cm-link {color: #000;} .osano-cm-link:focus {font-weight: normal;} .osano-cm-save.osano-cm-view__button.osano-cm-button {border-color: #fff;} .osano-cm-disclosure__toggle, .osano-cm-expansion-panel__toggle {color: #000; font-weight: normal;} .osano-cm-disclosure__toggle:hover, .osano-cm-dialog {font-size:1.2em;} .osano-cm-disclosure__toggle:active, .osano-cm-expansion-panel__toggle:hover, .osano-cm-expansion-panel__toggle:active, .osano-cm-expansion-panel__toggle:focus, .osano-cm-disclosure__toggle:focus {color: #000; font-weight: bold;} li.osano-cm-drawer-item:nth-child(5) {display: none;}";

var styleSheet = document.createElement("style"); 
styleSheet.innerText = styles; 
document.head.appendChild(styleSheet);
