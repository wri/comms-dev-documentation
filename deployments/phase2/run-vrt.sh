#!/bin/bash

# Example pantheon.env
# PANTHEON_USER=hkkahng@phase2technology.com
# AWS_PROFILE=p2devops

# Run from repo root.
# ./run-vrt.sh wriorg reference dev
# ./run-vrt.sh wriorg test live

PANTHEON_SITE=$1;
VRT_TYPE=$2;
VRT_TARGET=$3;

source ./pantheon.env

cd sites/$PANTHEON_SITE/vrt
pwd

# Run VRT reference
bash ../../vrt.sh $VRT_TYPE $VRT_TARGET

if [ $VRT_TYPE == "test" ]
then
  # Copy VRT to S3
  bash ../../../vrt-to-aws.sh wri $AWS_PROFILE $PANTHEON_SITE $VRT_TARGET ./backstop_data
fi
