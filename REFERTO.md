# Learning objects

## GIT
* [How to convert existing non-empty directory into a Git working directory and push files to a remote repository](http://stackoverflow.com/questions/3311774/how-to-convert-existing-non-empty-directory-into-a-git-working-directory-and-pus):
```
cd <localdir>
git init
git add .
git commit -m 'message'
git remote add origin <url>
git push -u origin master
```
* [Git flow cheatsheet](https://danielkummer.github.io/git-flow-cheatsheet/)
* [Disable push to URL](http://stackoverflow.com/questions/10260311/git-how-to-disable-push)
```
git remote set-url --push origin BRANCH
```
