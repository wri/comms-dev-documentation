#!/bin/bash

# Usage example:
# bash nukemodules.sh pantheon-site-name drupal-version pantheon-environment module-list
# bash nukemodules.sh wrisehirler1 7 wri-908 wrisehrler.txt
# Module list contents example:
# addtoany
# solr_devel
# taxonomy_manager

site=$1
drupal_version=$2
environment=$3
module_list=$4

modules=(`cat $module_list`)

for i in "${modules[@]}"; do
    case $drupal_version in
        7)
            terminus drush $site.$environment -- sql-query "DELETE from system where type = 'module' AND name = '"$i"';"
        ;;
        8)
            terminus drush $site.$environment -- sql-query "DELETE FROM key_value WHERE collection='system.schema' AND name='"$i"';"
        ;;
    esac
done
