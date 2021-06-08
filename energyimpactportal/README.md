energyimpactportal.org
======================

The site runs off AWS S3 and Cloudfront.

S3 bucket name: energyimpactportal.wri.org.

The site was originally built by Graphicacy.

Data Files
----------

The data for the site it stored as CSV files at /assets/data/ in the S3 bucket. When the content owners for the site provide new versions, upload them to that location.

1. Rename the existing file to filename_date-uploaded.csv
2. Check that the new file is named correctly (exact match of existing filename, check case)
3. Set permissions to 'read' for public access
