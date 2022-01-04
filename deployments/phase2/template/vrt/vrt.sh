#!/bin/bash

# Usage examples:
# bash vrt.sh clear
# bash vrt.sh reference live
# bash vrt.sh test live

case $1 in
  clear)
    rm -rf $PWD/backstop_data/html_report $PWD/backstop_data/bitmaps_*
  ;;
  reference)
    rm -rf $PWD/backstop_data/html_report $PWD/backstop_data/bitmaps_*
    backstop reference --config=$2.js
  ;;
  test)
    backstop test --config=$2.js
  ;;
esac
