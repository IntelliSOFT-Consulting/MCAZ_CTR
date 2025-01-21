
# MCAZ Clinical Trials System
This repository contains the necessary configuration files for setting up a Clinical Trials System using Docker. The system leverages CakePHP 3.x for the backend, MySQL for the database, and phpMyAdmin for database management. The application is designed to handle data related to clinical trials, including participant enrollment, data collection, and trial management.

## Prerequisites
Before you begin, ensure that you have the following installed:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/)


## Project Setup
### 1. Clone the Repository
First, clone the repository to your local machine:
```
git clone https://github.com/IntelliSOFT-Consulting/MCAZ_CTR.git
cd MCAZ_CTR
```
Then, navigate to the app/config directory and rename the file app.example.php to app.php:

```
cd app/config
mv app.example.php app.php

```
### 2. Build and Start the Containers

The project comes with a docker-compose.yml file that sets up all required services: MySQL, Apache, and phpMyAdmin.

Run the following command to build the Docker images and start the containers:
```
docker-compose up --build
```
This will:

- Build the Docker images.
- Start the MySQL container (db), the web server (web), and phpMyAdmin (phpmyadmin).
- Expose the web application on port 8767 and phpMyAdmin on port 8185.

### 3. Initializing the MySQL Database

The MySQL container will automatically execute the db.sql script on startup, if provided, to set up the database structure. This will create the necessary database (mcaz_ctr_prod) and user (changeme) as defined in the docker-compose.yml.

If you need to manually initialize or reinitialize the database, you can copy your SQL file to the ./db.sql location and restart the containers using:

 
```docker-compose down
docker-compose up --build
```
### 4. Accessing the Web Application

Once the containers are running, you can access the application at:

- http://localhost:8767

### 5. Accessing phpMyAdmin

You can also manage your MySQL database using phpMyAdmin. To access phpMyAdmin, go to:

- http://localhost:8185

Use the following credentials to log in:

- Username: changeme
- Password: changeme.
- Host: db (the MySQL service name defined in the docker-compose.yml)

### 6. Stopping the Containers

To stop the containers when you're done, run the following command:
 
```
docker-compose down

```
This will stop and remove the containers. If you want to remove all the containers, volumes, and networks, you can run:

 ```
docker-compose down --volumes --remove-orphans
```

### 7. Managing MySQL Data Persistence

To ensure that your MySQL data persists across container restarts, the docker-compose.yml defines a volume to store the data locally:
 ```
volumes:
  - ~/ctr-mysql-data:/var/lib/mysql
```
This will store the MySQL data on your local machine under the ~/ctr-mysql-data directory.

### 8. Customizing the Application

To customize the application, you can modify the CakePHP files directly on your host machine. The project files are mounted into the Docker container at:


```
volumes:
  - ./:/var/www/html/

```
This allows you to edit the files locally and see changes reflected immediately in the Docker container.
 
### 9. License
[![License](http://img.shields.io/:license-gnu-blue.svg?style=flat-square)](http://badges.gnu-license.org) 

Licensed under the GNU General Public License, Version 3.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    https://github.com/IntelliSOFT-Consulting/MCAZ_CTR/blob/master/LICENSE.md

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
 

