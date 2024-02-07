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
8. Update the ticket with the PR link, assign to ThinkShout team

## Hotfix Deployments

Not preferred. But sometimes we need to deploy updates internally (skipping the process above)

1. Notify ThinkShout that you're doing a hotfix deployment for Aqueduct. Point out that it's low-risk: the file changes are not part of the CMS.
2. Create a new issue in the WRIN repo
3. Get the latest version ....




