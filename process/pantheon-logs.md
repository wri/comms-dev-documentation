Parsing Pantheon Logs
=====================

Run 'collect-logs-rsync.sh' file to download logs.
The file is included here for convenience but for latest version and documentation: https://docs.pantheon.io/guides/logs-pantheon/automate-log-downloads

```
bash collect-logs-rsync.sh
```

The site ID and Pantheon ENV can be changed in the vars at the top of the file. 

This will pull multiple sets of logs if there are multiple app servers (i.e. wriflagship has 4 as of May 15 2024).

Then use GoAccess to view:
```
goaccess [app_server_id]/logs/nginx/nginx-access.log
```
OR generate an HTML report:
```
goaccess [app_server_id]/logs/nginx/nginx-access.log > report.html
```
Check suspect IPs here: https://www.abuseipdb.com/  



Documented here: 
---------------
automating log downloads: https://docs.pantheon.io/guides/logs-pantheon/automate-log-downloads

parsing access logs with goaccess: https://docs.pantheon.io/guides/logs-pantheon/nginx-access-logs
