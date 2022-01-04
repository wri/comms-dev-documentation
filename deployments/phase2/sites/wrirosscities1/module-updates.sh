#!/bin/bash

# Example usage:
# bash .docksal/module-updates.sh 7 WRI-1044

VERSION=$1
TICKET=$2

modules=(
  honeypot
  metatag
)

for i in "${modules[@]}"; do
    bash .docksal/update.sh $VERSION $TICKET $i
done
