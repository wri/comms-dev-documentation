## Aqueduct Web Apps

Current vendor: Green River. Originally built by Vizzuality. 

https://www.wri.org/aqueduct

Information pages (landing page, about, etc) are included as content within the CMS. The apps themselves run as static js apps out of the Applications directory in the D8 site: https://www.wri.org/applications/aqueduct/water-risk-atlas (etc)

### Vendor Workflow

Green river compiles the app into static files (html/js/css) and deploys to a branch on Pantheon. 

This environment is used for testing and then merged into the Main branch and then deployed as part of the standard pipeline.

### Older repos are here:

https://github.com/Vizzuality/aqueduct-countries-ranking

https://github.com/Vizzuality/aqueduct-flood

https://github.com/Vizzuality/Aqueduct-Water_Food_Security
