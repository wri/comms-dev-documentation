#!/bin/bash

# Run from project root
# Example usage:
# bash .docksal/update.sh 7 WRI-1044 ctools÷

VERSION=$1
TICKET=$2
MODULE=$3

rm -rf $PWD/.docksal/vrt/backstop_data/html_report $PWD/.docksal/vrt/backstop_data/bitmaps_*
docker run --rm -v $PWD/.docksal/vrt:/src backstopjs/backstopjs reference --config=local.js

case $VERSION in
  7)
    fin drush up -y $MODULE
    fin drush updb -y
    fin drush cc all
  ;;
  8)
    composer update drupal/$MODULE --with-dependencies
    fin drush updb -y
    fin drush cr
  ;;
esac


docker run --rm -v $PWD/.docksal/vrt:/src backstopjs/backstopjs test --config=local.js

open $PWD/.docksal/vrt/backstop_data/html_report/index.html

git status

# read -p "Continue with code commit? (enter yes to confirm) "
# if [ "$REPLY" != "yes" ]; then
# exit
# fi

git add .
git commit -m "$TICKET: Update module $MODULE"
git status
