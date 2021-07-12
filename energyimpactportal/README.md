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

Invalidate the files on Cloudfront (to force a refresh): https://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/Invalidation.html 

1. Using the AWS Console, select the cloudfront property "energyimpactportal"
2. Click the tab for "invalidations"
3. Click the button to "Create Invalidation"
4. Create a new invalidation for "/assets/data/*"
