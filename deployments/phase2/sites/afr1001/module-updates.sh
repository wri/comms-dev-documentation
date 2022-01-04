#!/bin/bash

# Example usage:
# bash .docksal/module-updates.sh 7 WRI-1044

VERSION=$1
TICKET=$2

modules=(
  file_entity
  form_builder
  link
  magic_beans
  media
  metatag
  nra_workbench_moderation
  webform
  workbench_moderation_notes
)

for i in "${modules[@]}"; do
    bash .docksal/update.sh $VERSION $TICKET $i
done
