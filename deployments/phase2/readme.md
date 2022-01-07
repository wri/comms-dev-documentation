## Archive of Deployment and VRT Scripts from Phase2
These are the scripts used to deploy to Pantheon and generate VRT using backstop.js

Notes on the WRI China IO instance on AWS EC2: https://github.com/wri/comms-dev-documentation/blob/main/deployments/phase2/WRI-ProjectClose-reposandscripts-070122-1512.pdf 

## PreReqs:
* Run through the install process in the `AWS` directory
  * This will be required if we want to send the VRT assets to AWS. This is not required if we want to keep things run on local and don't need to share the reports.
* Update `pantheon.env` information
  * (I don't have information about the Jenkins work)
* Search through the project for `phase2` and these URLs will need to be updated with the new URLs / information.
* Install [https://www.docker.com/](Docker)
* Install [https://github.com/garris/BackstopJS](BackstopJS)

## VRT
* `./run-vrt.sh <site-id> reference <local|dev|test|live>`
* `./run-vrt.sh <site-id> test <local|dev|test|live>`

### Adding Paths for testing
* Open `./sites/<site-id>/vrt/TestPaths.js`
* Copy an existing item and update with the new Label and Path

## Deploy
* `./go-wri.sh <site-id> <drupal-version> <dev|test|live>`
  * Ex: `./go-wri.sh oceanpanel 8 dev`
