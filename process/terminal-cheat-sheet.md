# Some Terminal Commands
## Files and File Management
~ : shortcut to your home directory

ls : lists files in the current directory. Add -lha flags to show hidden files and make it more human-readable

cd : change directory. 'cd directoryname' would move you to that directory within the current directory. 'cd ..' moves you up one directory. 

mkdir : creates a new directory

cp : copies a file or directory, as in 'cp filename filename2' would copy a file in the current diretory to a new file named filename2. 'cp *' copies all files. 'cp -r' is recursive, which will copy any directories within the directory as well. 

## Git
git pull : pulls the latest version of the repo

git checkout branchname : switches to an existing branch

git checkout -b origin/branchname : creates a new branch and switches to it

git add filename : adds/updates a file in the repo. 'git add -A :/' adds all modified files

git commit -m 'message here' : commits the changes

git push origin branchname : pushes any new work to the remote branch
