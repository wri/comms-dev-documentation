#!/bin/bash

# Example usage:
# bash ./maintenance/pantheon-pull.sh beinitiative1

PANTHEON_SITE=$1

source ./maintenance/pantheon.env

terminus auth:login --email=$PANTHEON_USER
fin ssh-key add $ID_FILE
fin pull init --hosting-platform=pantheon --hosting-site=$PANTHEON_SITE --hosting-env=develop wri_$PANTHEON_SITE
cp maintenance/local.settings.php wri_$PANTHEON_SITE/sites/default/
cp -r maintenance/template/ wri_$PANTHEON_SITE/.docksal/
cd wri_$PANTHEON_SITE
fin project start
fin pull db
fin drush en stage_file_proxy
