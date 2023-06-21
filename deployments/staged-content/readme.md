# Deploying Staged Content: Test => Production (Pantheon)

Steps for deploying staged content from the Test environment to the Live (production) environment on Pantheon.

These steps rely solely on the Pantheon dashboard UI, with some potential troubleshooting steps that use the Drupal admin UI.

## Backup the Live environment
On the Live tab for the site run a manual backup under 'Backups'.

## Deploy Code: Test => Live (check if necessary)
Coordinate with the development team to see if this step is needed. Ideally any changes to the codebase will have already been deployed. 

Confirm on the Live tab under 'Deploys' that there are no pending commits to deploy.

## Clone Database and Files: Test => Live
On the Live tab go to 'Database/Files' and then 'Clone'. Select the Test environment in the "From this Environment" dropdown. Click the box for both 'Clone Database' and 'Clone Files'.

## Clear Cache (Live)
Click the 'Clear Caches' button on the Live tab. This will clear the site (Drupal) cache, the server caches, and the CDN (fast.ly) cache.

# Troubleshooting
Check to see if the issue is also present on the Test environment first. If so, then the site owners can either (a) get the developers to make the fix, or (b) roll back the deployment by restoring from backup.

There should be no differences between the Test and Live environments after the deployment. If there are, and the other steps in this section don't resolve them, you can use Pantheon's live chat for support.
 
## Clear Caches: use the "Clear Caches" button on the Live tab
Most common issues are solved by clearing the cache. If you're not seeing
 the reported issue then ask the reporter to clear their browser cache.

## Run DB updates
Log in to the site as an admin user, then go to [sitedomain.org]/update.php 

## Run Cron
Cron is a site tool that performs scheduled tasks which are (sometimes) needed to implement changes to the configuration.

Log in to the site as Drupal admin and run cron: Configuration => System => Cron

## Synchronize Configuration Changes
There may be site configuration changes in the codebase that need to be synchronized. Log in to the site as Drupal admin: Configuration => Development => Configuration Synchronization. From that screen you can check differences and import changes. 

## Restore from Backup (roll back everything)
On the Live tab go to 'Backups' and then click the 'Restore' button next to the latest backup. The process will take a few minutes to complete.
