# Climate Finance Calulator
The calculator tool is an interactive data vizualation: https://www.wri.org/data/climate-finance-calculator
Insights article: https://www.wri.org/insights/international-climate-finance-which-countries-should-pay

Included as a Drupal Module named wri_viz_climate_finance_calc in wri.org's main repo

## Updating the data files
The data for the calculator is stored in the AWS S3 bucket for wri.org: wriorg/upload/climate-finance-calculator
https://us-east-1.console.aws.amazon.com/s3/buckets/wriorg?region=us-east-1&bucketType=general&prefix=upload/climate-finance-calculator/

There are 2 files: main_data.csv and readme.csv. 

Note that the readme.csv file contains some text strings used in the app.
