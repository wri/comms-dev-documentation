#!/usr/bin/env bash

# awscli.env example
# AWS_ACCESS_KEY_ID=rl8vHbW^!AY5d2kd
# AWS_SECRET_ACCESS_KEY=0AHh&4IEg7&U@Kss0AHh&4IEg7&U@Kss
# AWS_DEFAULT_REGION=us-west-2

source ./awscli.env
docker run --rm -t $(tty &>/dev/null && echo "-i") -e "AWS_ACCESS_KEY_ID=${AWS_ACCESS_KEY_ID}" -e "AWS_SECRET_ACCESS_KEY=${AWS_SECRET_ACCESS_KEY}" -e "AWS_DEFAULT_REGION=${AWS_DEFAULT_REGION}" -v "$(pwd):/project" mesosphere/aws-cli "$@"
