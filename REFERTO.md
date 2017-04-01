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

* [Avoid prompt to input username and password](http://stackoverflow.com/questions/8588768/git-push-username-password-how-to-avoid)
```
git config credential.helper store
git push https://github.com/YOUR-REPO.git

Username for 'https://github.com': <USERNAME>
Password for 'https://USERNAME@github.com': <PASSWORD>
```

## VUE
* Integration https://github.com/JeffreyWay/laravel-elixir-vue
* [Utilização do Vue.js em uma aplicação Laravel](https://www.youtube.com/watch?v=TGSJjDahlrQ&t=23s)
