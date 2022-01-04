const viewports = require('./testSizes.js');
const htmlPaths = require('./testPaths.js');
const vrtRoot = 'http://live-edindex1.pantheonsite.io/';

const scenarios = htmlPaths.map(function(path){
    const clickHere = path.clickOn ? path.clickOn : '';
    const delayTime = path.delay ? path.delay : 0;
    return {
      label: path.label,
      url: `${vrtRoot}/${path.partial}`,
      clickSelector: clickHere,
      delay: delayTime
    }
  }
);


module.exports = {
  "id": "backstop_default",
  "viewports": viewports,
  "onBeforeScript": "puppet/onBefore.js",
  "onReadyScript": "puppet/onReady.js",
  "scenarios": scenarios,
  "paths": {
    "bitmaps_reference": "backstop_data/bitmaps_reference",
    "bitmaps_test": "backstop_data/bitmaps_test",
    "engine_scripts": "backstop_data/engine_scripts",
    "html_report": "backstop_data/html_report",
    "ci_report": "backstop_data/ci_report"
  },
  "report": ["browser"],
  "engine": "puppeteer",
  "engineOptions": {
    "args": ["--no-sandbox"]
  },
  "engineFlags": [],
  "asyncCaptureLimit": 5,
  "asyncCompareLimit": 50,
  "debug": false,
  "debugWindow": false
}
