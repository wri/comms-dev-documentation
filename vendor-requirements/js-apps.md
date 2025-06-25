# Integrating Data Visualizations into WRI's Drupal Sites

The standard solution for data visualizations in WRI Comms is to build them in Flourish. 

The following are guidelines for alternate solutions to including js-based data visuaizations in our Drupal sites. 

## Guidelines for React Apps using a Drupal Module Wrapper

Prefered solution. A Drupal Module (example code below) to generate content blocks that can be added to page content in the CMS.

### React Notes

The Drupal module provides a target element where the React app will initialize. Any js framework could be used, but React is our prefered framework. 

### Drupal Module Notes

Examples are below, including a step-by-step tutorial. 

The Drupal module creates a unique content block that can be placed into any Drupal node, in whatever manner the site is configured (Block Layout, Layout Builder, etc.) 

## Alternate Solution: Self-Contained JavaScript Applications Hosted on Pantheon (Not Integrated with CMS/Drupal)

This approach supports data visualizations and interactive graphics as standalone applications or embeddable content. These apps are built and compiled as self-contained static files—HTML, JavaScript, and CSS—with no server-side dependencies.

---

## Requirements

Regardless of the build process, the final production output must consist solely of static files (`.html`, `.js`, `.css`). These files should:

- Have **no server-side dependencies**
- Load any external libraries via **CDN** or include them directly in the codebase

The resulting app should function as a flat-file package that can either:

- Run independently in a server directory, or
- Be embedded within a CMS content field

---

### 🧭 Standalone Applications

- **Hosting**: Files are served from a dedicated directory  
  _Example_: `wri.org/applications/[app-name]/index.html`
- **Asset Loading**: All assets (JS, CSS, images, etc.) must load from within the app’s directory—not from the site root
- **Theming**: Each app must include its own:
  - Header
  - Footer
  - Navigation
- **Tracking & Compliance**:
  - Integrate **Google Tag Manager (GTM)**
  - Include a **consent management tool** (e.g., Osano)

---

### 🔗 Embedded Applications

- **Integration**: The entire app (including external library calls) must be included directly in the CMS content area
- **Styling**: The app will inherit the CMS’s theme and must adapt to:
  - CMS layout
  - Breakpoints
  - Content widths

## Testing

Multiplatform testing using Browserstack or similar tools. Final code test should be on the Pantheon "multidev" instance to ensure full compatibility with our production environment. WRI Digital will merge to the Pantheon environment for testing, and manage deployments.

## Drupal Wrapper Code

Module naming: "wri_viz_[project name]"

wri_viz_[project name].info.yaml
``` 
name: [name of the project data visualization]
type: module
description: Custom functionality, display, and data handling for [project name]
core_version_requirement: '>=9.5'
package: WRI Data Viz
```

example block (from "cofi" project)
```
<?php

namespace Drupal\wri_viz_cofi\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a 'China Overseas Finance Inventory Data Viz' Block.
 *
 * @Block(
 *   id = "wri_viz_cofi",
 *   admin_label = @Translation("China Overseas Finance Inventory Data Viz"),
 *   category = @Translation("WRI Data Viz"),
 * )
 */
class COFI extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => '<wri-viz-cofi></wri-viz-cofi>',
      '#allowed_tags' => ['wri-viz-cofi'],
      '#attached' => ['library' => ['wri_viz_cofi/cofi']],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags() {
    // Rebuild block when node changes.
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      // If node, add its cachetag.
      return Cache::mergeTags(
            parent::getCacheTags(), [
              'node:' . $node->id(),
            ]
        );
    }
    else {
      // Return default tags instead.
      return parent::getCacheTags();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    // If you depend on \Drupal::routeMatch()
    // you must set context of this block with 'route' context tag.
    // Every new route this block will rebuild.
    return Cache::mergeContexts(
          parent::getCacheContexts(), [
            'route',
          ]
      );
  }

}
```
## Drupal Module Step-by-Step
This uses chart.js for a simple example. The actual module name would be wri_viz_[projectname] and not 'my_chart_block'.

1. Module Setup:

- Create a directory for your module in modules/custom/my_chart_block.
- Inside, create my_chart_block.info.yml and my_chart_block.libraries.yml.
- Create a src/Plugin/Block directory and a file named ChartBlock.php inside it.

2. my_chart_block.info.yml:
```
name: My Chart Block
type: module
description: Generates a block with a JavaScript chart.
core_version_requirement: ^10
libraries:
  - my_chart_block/chartjs
```
3. my_chart_block.libraries.yml:
```
chartjs:
  version: 1.x
  js:
    js/chart.umd.min.js: {}
    js/my_chart.js: {}
  dependencies:
    - core/jquery
```
- Download Chart.js (e.g., chart.umd.min.js) and place it in the modules/custom/my_chart_block/js directory.
- Create an empty my_chart.js file in the same directory.

4. src/Plugin/Block/ChartBlock.php:
```
<?php

namespace Drupal\my_chart_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Chart Block' block.
 *
 * @Block(
 * id = "chart_block",
 * admin_label = @Translation("Chart Block"),
 * category = @Translation("Custom")
 * )
 */
class ChartBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => '<canvas id="myChart" width="400" height="400"></canvas>',
      '#attached' => [
        'library' => [
          'my_chart_block/chartjs',
        ],
      ],
    ];
  }

}
```
- This block creates a <canvas> element for Chart.js to render the chart and attaches the chartjs library.

5. js/my_chart.js:
```
(function ($, Drupal) {
  Drupal.behaviors.myChart = {
    attach: function (context, settings) {
      $(context).find('#myChart').once('myChartInit').each(function () {
        const ctx = this.getContext('2d');
        const myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      });
    }
  };
})(jQuery, Drupal);
```
- This JavaScript code uses Chart.js to create a simple bar chart within the <canvas> element.
- The Drupal behavior ensures the chart is initialized correctly when the block is rendered.
