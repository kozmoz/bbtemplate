# Lokaal Hellendoorn Wordpress Template


## Development

### Installation

* Install npm (https://www.npmjs.com)
* Install Docker (https://www.docker.com, Download and install the installer)
* Install SASS (http://sass-lang.com/install, sudo gem install sass --no-user-install)


### Start the environment

To start the development environment Wordpress backend 
(Docker needs to be installed and running):

    $ cd docker
    $ docker-compose -f docker-compose-development.yml up
    $ open in browser: http://localhost:8005/

Start watching for JavaScript and CSS changes:

    $ cd themes/Lokaal-Hellendoorn/_grunt
    $ npm install
    $ grunt 


## MariaDB

### Database Log

The docker exec command allows you to run commands inside a Docker container.  
The following command line will give you a bash shell inside your mariadb container:

    $ docker exec -it some-mariadb bash

The MariaDB Server log is also available through Docker's container log:

    $ docker logs some-mariadb


### Database Dump

Use docker exec and run the tool from the same container, similar to the following:

    $ docker exec some-mariadb sh -c 'exec mysqldump --all-databases -uroot -p"$MYSQL_ROOT_PASSWORD
