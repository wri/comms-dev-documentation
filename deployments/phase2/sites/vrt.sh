#!/bin/bash

# Usage examples:
# ./vrt.sh clear
# ./vrt.sh reference live
# ./vrt.sh test live

case $1 in
  clear)
    rm -rf $PWD/backstop_data/html_report $PWD/backstop_data/bitmaps_*
  ;;
  reference)
    rm -rf $PWD/backstop_data/html_report $PWD/backstop_data/bitmaps_*
    docker run --rm --shm-size=1024m -v $(pwd):/src backstopjs/backstopjs reference --config=$2.js
  ;;
  test)
    docker run --rm --shm-size=1024m -v $(pwd):/src backstopjs/backstopjs test --config=$2.js
  ;;
esac
