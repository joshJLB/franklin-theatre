## Prerequisites



1. docker and docker-compose installed and available on the command line. (run: `docker —version && docker-compose —version` to make sure they are installed)



2. A Bitbucket account that is a part of the JLB team



3. A new Bitbucket repo for your project within the scope of that team





### To set up local dev environment



1. git clone https://github.com/jlbworks/docker-locker.git PROJECT_NAME/FOLDER_NAME



2. 'cd FOLDER_NAME && rm -rf .git`



3. 'git init && git remote add origin YOUR_NEW_BITBUCKET_REPO_URL_HERE`



4. open  `docker-compose.yml` file & change all instances of `test` with the name of your project



5. check running docker containers `docker container ls`

 'docker stop $(docker ps -aq)' to stop all containers

 'docker rm $(docker ps -aq)' to remove all containers



6. `docker-compose up -d —build`



7. run: `dockerbash $projectName` || `winpty docker exec -it $1 bash` 

8. run: `startup`



9. after install run: `rm -rf .git`



10. run `serve` (if babel/core cannot be found, run: `npm install @babel/core` then `serve`)



11. browse to http://localhost:3000



12. run through installer ( may take a second to load )





#### Ensure that JLBTheme is being tracked in repository



1. Open a new terminal && cd PROJECT_NAME/FOLDER_NAME/themes/JLBTheme && rm -rf .git





### Move Site to Server



1. go to localhost:8080 and export local database .sql file



2. open .sql file in text-editor and find & replace two things:

  a. localhost: jlbdev.com/$project

  b. utf8mb4_unicode_$number_ci: utf8mb4_unicode_ci



3. navigate to jlbdev.com:2082 and go to terminal. run: `cd public_html` && `mkdir $projectName` && `cd $projectName` && `wp-download`

   `cd wp-content` and run: `rm -rf plugins && rm-rf themes`



4. while in wp-content run: `git clone $yourRepository`



5. In MySQL Databases, create new database using your `$projectName`



6. While in MySQL Databases, create new user with the name `jlbdev_$projectName`, generate random password (Save to zoho aaccount) then assign it to the database you just          created.



7. In phpmyadmin, click on the database you just created. Import your .sql file



8. In file manager, open repo folder and move plugins, themes, and uploads into wp-content (up one level )



9. rename "wp-config-sample.php" to "wp-config.php". right click file and edit file. add database name/username/password/salt keys.`



10. navigate to jlbdev.com/$project/wp-admin in browser





### MySQL Backups



https://hub.docker.com/r/jswetzen/mysql-backup/

The `mysql-backup` folder containers one backup from every hour for the past ten hours. If you need to keep any of these backups long term make sure to copy them somewhere safe because backups older than 10 hours are deleted.



Refer to the documentation to see how to restore.



Basic gist is run: `docker exec backup ls /backup` to see available restore files.

Then run: `docker exec backup /restore.sh /backup/2015.08.06.171901.sql` with this line `2015.08.06.171901.sql` referring to the backup you want to restore to.



Alternatively use the SQL files with `phpmyadmin` at http://localhost:8080 to restore with.
