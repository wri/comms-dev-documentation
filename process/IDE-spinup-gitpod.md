IDE Spinup: Gitpod
==================

Gitpod steps to spin up a fresh Drupal environment: 

1. Create an account at https://gitpod.io/ 
2. Go to: https://ddev.github.io/ddev-gitpod-launcher/ 
3. From the Gitpod terminal, be sure to navigate into the project root - the "d10simple" directory.
4. After installation is complete, use the following command to replace the Umami installation profile with the standard Drupal installation profile:
ddev drush site-install --account-pass=admin
5. Copy web/sites/example.settings.local.php to web/sites/default/settings.local.php and conditionally include it in web/sites/default/settings.php 

More information about using DDEV and Gitpod together can be found at: https://ddev.readthedocs.io/en/latest/users/topics/gitpod/
