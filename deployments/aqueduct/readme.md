# Aqueduct

The Aqueduct tools run as static files on the wriflagship server (Pantheon). The informational pages are part of the CMS as content.

Each tool has its own directory at /applications/aqueduct

The Aqueduct development team pushes changes to a branch (and multidev) of the wriflagship Pantheon repo named "aqueduct". They use this for testing.

## Deployments

1. Create a new issue in the WRIN repo
2. Make a new branch of the wriflagship github repo named "wri-xxx" where xxx is the issue number
3. Switch to the new branch
4. Grab the latest files from the "aqueduct" branch of the Pantheon repo (NOT the github repo): xxxx
5. Copy the new files to the corresponding directory on the new branch
6. Commit and then push the new branch
7. Create a PR



