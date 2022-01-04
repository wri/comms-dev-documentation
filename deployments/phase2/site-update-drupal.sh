#!/bin/bash

# Example usage:
# bash site-update-drupal.sh -s wriorg -d 7 -t WRI-1212 -m "ctools features geocoder markdown radioactivity rabbit_hole"

set -e

source $PWD/pantheon.env

while getopts s:t:d:m:f: option
do
    case "${option}"
    in
        s) PANTHEON_SITE=${OPTARG};;
        d) DRUPAL_VERSION=${OPTARG};;
        t) JIRA_TICKET=${OPTARG};;
        m) MODULE_LIST=${OPTARG};;
    esac
done

echo "Pantheon Site: "$PANTHEON_SITE
echo "Drupal Version: "$DRUPAL_VERSION
echo "Jira Ticket: "$JIRA_TICKET
echo "Module List: "$MODULE_LIST
echo $COMMIT_MESSAGE

terminus auth:login --email=$PANTHEON_USER

# Reset develop multidev
terminus multidev:delete --delete-branch $PANTHEON_SITE.develop --yes
terminus multidev:create $PANTHEON_SITE.live develop

# Make VRT reference run
cd sites/$PANTHEON_SITE/vrt
bash ../../vrt.sh reference develop

# Merge upstream updates
terminus upstream:updates:apply $PANTHEON_SITE.develop --accept-upstream --updatedb

# Apply module updates
terminus connection:set $PANTHEON_SITE.develop sftp --yes
for i in $MODULE_LIST; do
  terminus drush $PANTHEON_SITE.develop -- up -y $i
  terminus drush $PANTHEON_SITE.develop -- updb -y
done
terminus drush $PANTHEON_SITE.develop -- cc all -y
terminus env:clear-cache $PANTHEON_SITE.develop

# Make VRT test run
bash ../../vrt.sh test develop
bash ../../../vrt-to-aws.sh wri p2devops $PANTHEON_SITE develop ./backstop_data

# Commit code and reset site to git mode
terminus env:commit --message $JIRA_TICKET --force -- $PANTHEON_SITE.develop
terminus connection:set $PANTHEON_SITE.develop git --yes
