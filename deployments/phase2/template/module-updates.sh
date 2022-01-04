#!/bin/bash

# Example usage:
# Create am modules.list file with list of modules to be updated, one in each line
# bash .docksal/module-updates.sh 7 WRI-1044

VERSION=$1
TICKET=$2

modules=(
  modules=(`cat ./modules.list`)
)

for i in "${modules[@]}"; do
    bash .docksal/update.sh $VERSION $TICKET $i
done
