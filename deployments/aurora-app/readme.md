# Aurora App: auroramonitoring.org 

Forests/Restoration team. Link to site/app notes in the Digital team Website Portfolio: https://app.asana.com/0/1204518168455047/1204542271751215  

The Aurora app is hosted on AWS S3 ("aurora-wri") with Cloudfront. 

The app itself is developed by external devs (Vielca). They push new builds to the repo at https://github.com/vielca/auroramonitoring_builds. That's a private repo, you may need to request access.

## Deployment

1. Grab the new or updated files from https://github.com/vielca/auroramonitoring_builds
2. Copy the new/updated files to the "aurora-wri" S3 bucket on AWS: https://s3.console.aws.amazon.com/s3/buckets/aurora-wri?region=us-west-2&bucketType=general&tab=objects
3. You then need to clear the cache on Cloudfront
   1. Create a new 'invalidation': https://us-east-1.console.aws.amazon.com/cloudfront/v4/home?region=us-west-2#/distributions/E12B44M88SVFIX/invalidations
   2. You can either copy the most recent invalidation and run it, or create a new invalidation with the Object Path "/*" (no quotes)
