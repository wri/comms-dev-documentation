# Deploying Staged Content: Test=>Production (Pantheon)
## Backup the Live environment
On the Live tab for the site run a manual backup under 'Backups'.
## Deploy Code: Test=>Live (check if necessary)
Coordinate with the development team to see if this step is needed. Ideally any changes to the codebase will have already been deployed. 

Confirm that on the Live tab under 'Deploys' that there are no pending deployment.
## Clone Database and Files: Test=>Live
On the Live tab go to 'Database/Files' and then 'Clone'. Select the Test environment in the "From this Environment" dropdown. Select both 'Clone Database' and 'Clone Files'.
## Clear Cache (Live)
Click the 'Clear Caches' button on the Live tab. This will clear the Drupal (site) cache, the server caches, and the CDN (fast.ly) cache.

# Troubleshooting
Check to see if the issue is also present on the Test environment first. If so, then the site owners can either (a) get the developers to make the fix, or (b) roll back the deployment by restoring from backup. 
## Clear Caches: use the "Clear Caches" button on the Live tab
Most common issues are solved by clearing the server cache. If you're not seeing
 the reported issue then ask the reporter to clear their browser cache.
## Run DB updates: log in to the site as an admin user, then go to [sitedomain.org]/update.php 
## Restore from Backup (roll back everything): on the Live tab go to 'Backups' and then click the 'Restore' button next to the latest backup
