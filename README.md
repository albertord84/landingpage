<<<<<<< HEAD
ssh  albertord84@162.249.2.205 -p 7822


// Init to work in a local folder from server
git init
#git clone https://github.com/albertord84/dumbu.git
git remote add origin https://github.com/albertord84/dumbu.git
git add .
git commit -m "adding files"
git pull -u origin master
git push -u origin master


git merge --ff origin/develop

// Create a new branch
git checkout -b new_branch #< create a new local branch with a copy of your code
git push origin new_branch #< pushes to the server

// Store credentials to secure conections
git config credential.helper store
=======
ssh  albertord84@162.249.2.205 -p 7822
ssh  albertord@vps0417.publiccloud.com.br


// Init to work in a local folder from server
git init
#git clone https://github.com/albertord84/dumbu.git
git remote add origin https://github.com/albertord84/dumbu.git
git add .
git commit -m "adding files"
git pull -u origin master
git push -u origin master


// Create a new branch
git checkout -b new_branch #< create a new local branch with a copy of your code
git push origin new_branch #< pushes to the server

// Store credentials to secure conections
git config credential.helper store


// Web Driver
java -Dwebdriver.gecko.driver="/var/www/html/testdriver/geckodriver" -jar /var/www/html/testdriver/selenium-server-standalone-3.0.0-beta3.jar
>>>>>>> refs/remotes/origin/develop
