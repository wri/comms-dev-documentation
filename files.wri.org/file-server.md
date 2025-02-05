# File Server: files.wri.org 

The file server is an AWS S3 bucket that serves files for the wri.org site. 
- This includes all files added to content, including pdfs for publications.
- This does not inlcude theme assets.

## Reverse Proxy Server

AWS EC2 i-0ac86e2764b3e88d7 (Files Reverse Proxy) -- AWS Oregon Region

- htaccess is routing traffic to 'redirect.php' in the site root
- 'redirect.php' handles all routing from there, and includes the recaptcha code (bot prevention)o prevent bots
- Certbot is managing the SSL cert
