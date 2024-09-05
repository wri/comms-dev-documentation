## External Publications List for Staff Profiles

1. WRI Libraries maintains a list of non-WRI publications by our staff. They output a json file and share with the Digital Team.
2. Digital pushes the file to https://us-east-1.console.aws.amazon.com/s3/buckets/wriorg?region=us-east-1&bucketType=general&prefix=external-publications/&showversions=false -- which is the /external-publications folder in the wriorg S3 bucket on AWS.
  1. Rename the current 'externalpubs.json' file with the date to make a backup
  2. Name the new file 'externalpubs.json'
3. WRI.org uses the 'external_publications' module to generate the list and populate the block. It contains the logic to match staff names with the author names in the json file.
4. Note: a handful of staff publish under alternate names or spellings. There are fields on the staff profile page where the alternate versions can be added.
