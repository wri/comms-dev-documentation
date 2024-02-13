# Aqueduct

The Aqueduct tools run as static files on the wriflagship server (Pantheon). The informational pages are part of the CMS as content.

Each tool has its own directory at /applications/aqueduct

The Aqueduct development team pushes changes to a branch (and multidev) of the wriflagship Pantheon repo named "aqueduct". They use this for testing.

## Deployments

1. Create a new issue in the wriflagship repo (using github projects) https://github.com/orgs/wri/projects/15 
2. Make a new branch of the wriflagship github repo named "wri-xxx" where xxx is the issue number
3. Switch to the new branch :)
4. Grab the latest files from the "aqueduct" branch of the Pantheon repo (NOT the github repo): https://dashboard.pantheon.io/sites/29dfa634-88ba-4ba3-a88c-377f3b9656d2#aqueduct
5. Copy the new files to the corresponding directory on the new branch
6. Commit and then push the new branch
7. Create a Pull Request in github against the Develop branch
8. Update the ticket with the PR link, assign to ThinkShout team
9. ThinkShout team will deploy

## Hotfix Deployments

Not preferred. But sometimes we need to deploy updates internally (skipping the process above)

1. Create a new issue in the wriflagship repo (using github projects) https://github.com/orgs/wri/projects/15 
2. Notify ThinkShout that you're doing a hotfix deployment for Aqueduct. Point out that it's low-risk: the file changes are not part of the CMS.
3. Spin up a new multidev on wriflagship, name the multidev "wri-xxx" where xxx is the issue number
4. Pull or clone the wriflagship Pantheon repo, switch to the multidev branch
5. Grab the latest files from the "aqueduct" branch of the Pantheon repo: https://dashboard.pantheon.io/sites/29dfa634-88ba-4ba3-a88c-377f3b9656d2#aqueduct
6. Copy the new files to the corresponding directory on the multidev branch
7. Commit and then push the new branch
8. Make backups for the Dev, Test, and Live environments on Pantheon
9. Merge the multidev to Dev, test it. Repeat for Test and Live environments
10. Clear caches on Live
11. Delete the multidev now that you're done




