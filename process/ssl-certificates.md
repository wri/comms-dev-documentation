## Generating and Maintaining SSL Seucirty Certificates

### Pantheon

Pantheon sites auto-generate certs using Let's Encrypt. No maintenance needed.

### Wildcard Cert for *.wri.org

Sites using the wildcard:

* It Infrastructure: IMPORTANT! Share all new certs with the IT team. Various tools, network services, and who knows what will break if the cert expires. They will need ample time and advance notice to renew the cert.
* Redirect Server: a variety of the domains use the 'redirect server' to resolve their .wri.org domain. These are mostly legacy or vanity urls, but they include important domains like 'intranet.wri.org' and 'careers.wri.org'.
  * Certs are saved in /var/www/wri_cert/ and named wri_org.crt AND worldresources.crt [note: this should be changed to a single .crt one day, its only 2 because of uncoordinated work setting up the apache config files]. 
* ... more

### Miscellaneous Certs

Where possible, use Let's Encrypt and the certbot tool to generate and auto-renew certs.

