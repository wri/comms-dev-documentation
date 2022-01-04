#!/bin/bash

# Example usage:
# bash .docksal/module-updates.sh WRI-1044

modules=(
  services
  stage_file_proxy
  tagclouds
  views
  views_datasource
  webform
)

for i in "${modules[@]}"; do
    bash .docksal/update.sh $1 $i
done
