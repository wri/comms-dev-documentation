<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all envrionments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to insure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * If there is a local settings file, then include it
 */
$docksal_settings = __DIR__ . "/docksal.settings.php";
if (file_exists($docksal_settings)) {
 include $docksal_settings;
}

$local_settings = __DIR__ . "/settings.local.php_s";
if (file_exists($local_settings)) {
  include $local_settings;
}
