#!/bin/bash

# Run from project root
# Example usage:
# bash .docksal/update.sh WRI-1044 ctools÷

TICKET=$1
MODULE=$2

rm -rf $PWD/.docksal/vrt/backstop_data/html_report $PWD/.docksal/vrt/backstop_data/bitmaps_*
docker run --rm -v $PWD/.docksal/vrt:/src backstopjs/backstopjs reference --config=local.js

fin drush up -y $MODULE
fin drush updb -y
fin drush cc all

docker run --rm -v $PWD/.docksal/vrt:/src backstopjs/backstopjs test --config=local.js

open $PWD/.docksal/vrt/backstop_data/html_report/index.html

git status

read -p "Continue with code commit? (enter yes to confirm) "
if [ "$REPLY" != "yes" ]; then
exit
fi

git add $PWD/sites/all/modules/contrib/
git commit -m "$TICKET: Update module $MODULE"
git status
