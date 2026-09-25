# Redirect Server

Redirect tool for various domains and redirect rules.

The Redirect Server is an AWS EC2 running Ubuntu/Apache. 

SSL certs are maintained using Let's Encrypt, except for wri.org subdomains that use the *.wri.org wildcard cert: [[link to ssl cert process]](https://github.com/wri/comms-dev-documentation/blob/main/process/ssl-certificates.md)

US-West Oregon region of our AWS account: 
https://us-west-2.console.aws.amazon.com/ec2/home?region=us-west-2#InstanceDetails:instanceId=i-01d6b4b57c24d08cf 

Let' Encrypt SLL cert renewals are automated (cerbot)

Server updates are automated (Ubuntu security updates)

Backups are set to monthly, last 3 retained 

Key file is "wricomms.pem"
