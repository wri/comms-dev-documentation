#!/bin/bash

# Example usage:
# bash .docksal/module-updates.sh WRI-1044

modules=(
  field_collection
  search_api
  wysiwyg
)

for i in "${modules[@]}"; do
    bash .docksal/update.sh $1 $i
done
