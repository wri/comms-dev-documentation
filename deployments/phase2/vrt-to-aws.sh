#!/bin/bash

# Example:
# bash vrt-to-aws.sh wri p2devops wrisehirler1 test ~/Downloads/backstop_data

PROJECT=$1
AWS_PROFILE=$2
PANTHEON_SITE=$3
PANTHEON_ENVIRONMENT=$4
VRT_REPORT_PATH=$5

aws s3 rm s3://vrt.phase2tech.com/$PROJECT/$PANTHEON_SITE-$PANTHEON_ENVIRONMENT --recursive
aws s3 sync $VRT_REPORT_PATH s3://vrt.phase2tech.com/$PROJECT/$PANTHEON_SITE/$PANTHEON_ENVIRONMENT --delete --acl public-read
