## Generating and Maintaining SSL Security Certificates

With a few exceptions Comms only maintains certs for the sites that we manage.

### Pantheon

Pantheon sites auto-generate certs using Let's Encrypt. No maintenance needed.

### Wildcard Cert for *.wri.org

We maintain our wildcard cert with DigiCert. 
  * To generate a new cert run the CSR (certificate signing request) on the AWS EC2 'redirect server' using openssl:
    * ``` $ openssl req -new -newkey rsa:2048 -nodes -keyout wri_cert.key -out wri_cert.csr ``` 
    * Common Name (CN) is the "fully qualified domain name (FQDN)", set this as "*.wri.org" (no quotes) 
  * Log into digicert and renew. Use the key provided by the CSR request.
  * Certs are stored on OneDrive: Digital Team Web Development -> certs -> wri.org
  * Example: on the AWS EC2 'redirect server' these 3 files need to be replaced:
    * SSLCertificateFile /var/www/wri_cert/worldresources.crt (wildcard cert) = replace with 'star_wri_org.crt'
    * SLCertificateKeyFile /var/www/wri_cert/worldresources.key (private key) = replace with wri_cert.key (or whatever filename for the private key generated at the time of the CSR)
    * SSLCertificateChainFile /var/www/wri_cert/DigiCertCA.crt (intermediary cert) = replace with 'DigiCertCA.crt'

Sites using the wildcard:

* It Infrastructure: IMPORTANT! Share all new certs with the IT team. Various tools, network services, and who-knows-what might break if the cert expires. They will need ample time and advance notice to renew the cert.
* Redirect Server: a variety of the domains use the 'redirect server' to resolve their .wri.org domain. These are mostly legacy or vanity urls, but they include important domains like 'intranet.wri.org' and 'careers.wri.org'.
  * Certs are saved in /var/www/wri_cert/ and named wri_org.crt AND worldresources.crt [note: this should be changed to a single .crt one day, its only 2 because of uncoordinated work setting up the apache config files]. 
* datasets.wri.org
* gis.wri.org including the other subdomains gis-stage.wri.org, gis-gfw.wri.org, gfw-staging.wri.org
* EV Simulator -- managed by WiredCraft, includes
  * ev-simulator.wri.org  
  * staging-ev-simulator.wri.org 
  * pipelines-ev-simulator.wri.org.  

### Cloudfront and ACM

[notes on generating certs for S3 and other cloudfront sites]

### Miscellaneous Certs

Where possible, use Let's Encrypt and the certbot tool to generate and auto-renew certs
* Install certbot: https://certbot.eff.org/ 
* Once certbot has successfully set up the certificate (running sudo certbot certonly --apache), you can renew with “sudo certbot renew”. Use “sudo certbot renew --dry-run" to check for expiring certs, and "certbot certonly --force-renew -d example.com" to renew a specific cert
* configure certbot to auto renew

