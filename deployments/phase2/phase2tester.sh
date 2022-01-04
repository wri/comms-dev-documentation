#!/bin/bash

# Example usage:
# bash phase2tester.sh wriorg.develop

terminus auth:login --email=<USERNAME>@mail.com
terminus drush $1 -- user-create "phase2tester" --mail="wri-phase2@mail.com" --password=ph4s32test
terminus drush $1 -- urol "administrator" phase2tester
