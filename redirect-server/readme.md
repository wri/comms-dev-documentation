# Redirect Server

Redirect tool for various domains and redirect rules.

The Redirect Server is an AWS EC2 running Apache. 

SSL certs are maintained using Let's Encrypt, except for most wri.org subdomains that use the *.wri.org wildcard cert: [link to ssl cert process]

US-West Oregon region of our AWS account: 
https://us-west-2.console.aws.amazon.com/ec2/home?region=us-west-2#InstanceDetails:instanceId=i-01d6b4b57c24d08cf 

Backups are manual. We periodically create an image file (AMI).

Key file is "wricomms.pem".
