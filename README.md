# Lokaal Hellendoorn Wordpress Template


## Development

### Installation

Installation process in summary:

* Install npm (https://www.npmjs.com)
* Install Docker (https://www.docker.com, Download and install the installer)
* Install SASS (http://sass-lang.com/install, sudo gem install sass --no-user-install)


### Start the environment

To start the development environment Wordpress backend 
(Docker needs to be installed and running):

    $ docker-compose up
    $ open http://localhost:8005/

Start watching for JavaScript and CSS changes:

    $ cd themes
    $ npm install  || (only once)
    $ npm run serve 


## Build and Deploy Wordpress Theme

Update the version number in package.json.

Build the WordPress template zip:

    $ cd themes
    $ npm install
    $ npm run build

New install: Upload the theme zip `lokaal-hellendoorn.zip` within WordPress -> Themes -> Add

In case of theme update: 
 * Install plugin "Update Theme and Plugins from Zip File"
 * Upload the theme zip `lokaal-hellendoorn.zip` within Wordpress -> Themes -> Add 


## MariaDB

### Database Log

The docker exec command allows you to run commands inside a Docker container.  
The following command line will give you a bash shell inside your mariadb container:

    $ docker exec -it lh_mariadb bash

The MariaDB Server log is also available through Docker's container log:

    $ docker logs lh_mariadb

### Create new database

    $ mysql> CREATE DATABASE  `wordpress` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

### Database Dump

Use docker exec and run the tool from the same container, similar to the following:

    $ docker exec some-mariadb sh -c 'exec mysqldump --all-databases -uroot -p"$MYSQL_ROOT_PASSWORD
