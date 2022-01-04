#!/bin/bash

# Example pantheon-deploy.env
# PANTHEON_USER=email-address-of-pantheon-account
# VRT_JENKINS_USER=vrt-manager-username
# VRT_JENKINS_API_KEY=vrt-manager-api-key
# VRT_JENKINS_JOB_TOKEN=vrt-manager-job-token

# Usage of deploy script
# bash pantheon-deploy.sh -s site-name -t vrt-test-name -d drupal-version -m multidev-name -f deploy-to
# For example:
# bash pantheon-deploy.sh -s newclimateeconomy1 -t wri-thenewclimateeconomy_run_vrt -d 7 -m development -f test
# bash pantheon-deploy.sh -s newclimateeconomy1 -t none -d 7 -m development -f test
# bash pantheon-deploy.sh -s afr1001 -t local -d 7 -m develop -f test

source $PWD/pantheon.env

while getopts s:t:d:m:f: option
do
    case "${option}"
    in
        s) PANTHEON_SITE=${OPTARG};;
        t) VRT_TEST=${OPTARG};;
        d) DRUPAL_VERSION=${OPTARG};;
        m) MULTIDEV_BRANCH=${OPTARG};;
        f) DEPLOY_TARGET=${OPTARG};;
    esac
done

echo "Pantheon Site: "$PANTHEON_SITE
echo "VRT Test: "$VRT_TEST
echo "Drupal Version: "$DRUPAL_VERSION
echo "Multidev Branch: "$MULTIDEV_BRANCH

function pantheon_pre_deploy () {
    echo "Starting VRT reference run on "$1
    run_vrt $1 "reference"

    echo "Backing up "$1
    terminus backup:create $PANTHEON_SITE.$1
}

function pantheon_post_deploy {
    terminus drush $PANTHEON_SITE.$1 -- updb -y
    if [ $DRUPAL_VERSION == "8" ]
    then
        # terminus drush $PANTHEON_SITE.$1 -- cim -y
        terminus drush $PANTHEON_SITE.$1 -- cr
    elif [ $DRUPAL_VERSION == "7" ]
    then
        terminus drush $PANTHEON_SITE.$1 -- cc all
    fi
}

function run_vrt () {
    if [ $VRT_TEST == "none" ]
    then
        echo "No VRT requested"
    elif [ $VRT_TEST == "local" ]
    then
        cd sites/$PANTHEON_SITE/vrt
        ../../vrt.sh $2 $1
        # Copy results to AWS S3 if VRT in Test mode
        if [ $2 == "test" ]
        then
            bash ../../../vrt-to-aws.sh wri p2devops $PANTHEON_SITE $1 ./backstop_data
        fi
        cd ../../..
    else
        # Account for the VRT job using 'prod' for Pantheon 'live' environment
        if [ $1 == "live" ]
        then
            VRT_ENV="prod"
        else
            VRT_ENV=$1
            echo $VRT_ENV
        fi
        CRUMB=$(curl -s 'http://'"$VRT_JENKINS_USER:$VRT_JENKINS_API_KEY"'@vrt-manager.phase2testing.com:8081/crumbIssuer/api/xml?xpath=concat(//crumbRequestField,":",//crumb)')
        curl -X POST -H "$CRUMB" -u "$VRT_JENKINS_USER:$VRT_JENKINS_API_KEY" --data-urlencode "token=$VRT_JENKINS_JOB_TOKEN" 'http://vrt-manager.phase2testing.com:8081/view/WRI/job/'"$VRT_TEST"'/buildWithParameters?ENV='"$VRT_ENV"'&VRT_MODE='"$2"''
    fi
}

terminus auth:login --email=$PANTHEON_USER

case $DEPLOY_TARGET in
    test)
        # pantheon_pre_deploy "dev"

        # read -p "Continue with code deploy to Dev? (enter yes to confirm) "
        # if [ "$REPLY" != "yes" ]; then
        # exit
        # fi

        echo "Deploying code from ${MULTIDEV_BRANCH} to Dev"
        terminus multidev:merge-to-dev $PANTHEON_SITE.$MULTIDEV_BRANCH
        pantheon_post_deploy "dev"

        # echo "Starting VRT test run on Dev"
        # run_vrt "dev" "test"
        #
        # read -p "Continue with code deploy to Test? (enter yes to confirm) "
        # if [ "$REPLY" != "yes" ]; then
        # exit
        # fi

        terminus env:wake $PANTHEON_SITE.test
        pantheon_pre_deploy "test"

        echo "Deploying code from Dev to Test"
        terminus env:deploy $PANTHEON_SITE.test
        pantheon_post_deploy "test"

        echo "Starting VRT test run on Test"
        run_vrt "test" "test"
    ;;
    live)
        echo "Starting VRT reference run on Live"
        run_vrt "live" "reference"

        echo "Backing up Live"
        terminus backup:create $PANTHEON_SITE.live

        # read -p "Continue with code deploy to Live? (enter yes to confirm) "
        # if [ "$REPLY" != "yes" ]; then
        # exit
        # fi

        echo "Deploying code from Test to Live"
        terminus env:deploy $PANTHEON_SITE.live
        pantheon_post_deploy "live"

        echo "Starting VRT test run on Live"
        run_vrt "live" "test"
    ;;
esac
