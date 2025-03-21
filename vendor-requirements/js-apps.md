# Integrating Data Visualizations into WRI's Drupal Sites

## Guidelines for React Apps using a Drupal Module Wrapper

Our prefered solution is to create a Drupal Module (example code below) to generate blocks within the CMS that can then be added to page content.

### React Notes

[notes here]

### Drupal Module Notes

Examples are below. The Drupal module creates a block along with the necessary js and css.

## Self Contained JS Apps Hosted On Pantheon But Not Integrated Into Drupal

A solution for data visualizations and interactive graphics to be used as free standing apps or embedded content (iframe). The apps are built/compiled as a set of self-contained files running as html/js/css without server requirements or dependencies. 

## Requirements

Regardless of how the app is compiled, the production build needs to be a set of static files (html/js/css) with no server requirements or dependencies. Any external libraries can be pulled in via cdn or included in the codebase. 

Essentially, the app needs to be flat files that can either run within a directory on the server, or be iframed into content elsewhere, depending on the requirements for the project.

The files are called from the file directory (i.e. wri.org/applications/the/app/directory/index.html) and all assets and resources (js, css, and files) need to pull from within that directory and not the site root.

## Testing

Multiplatform testing using Browserstack or similar tools. Final code test should be on the Pantheon "multidev" instance to ensure full compatibility with our production environment. WRI will merge to the Pantheon environment for testing, and manage deployments.

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
