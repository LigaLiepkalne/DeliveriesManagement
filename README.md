# Client Delivery Data Management

#### Project aims at efficiently storing, retrieving, and managing client delivery data using MySQL. It consists of five pages that allow you to manage client delivery information. Best practices for indexing and optimizing queries are introduced to ensure improved performance.

- [Overview](#overview)
- [Technologies used](#technologies-used)
- [Run project](#run-project)

### Overview

![Intergaz-main](https://user-images.githubusercontent.com/110776571/215357468-8b9fafb2-3fd7-42ba-af52-12820bf11294.gif)

![Intergaz-otherPages](https://user-images.githubusercontent.com/110776571/215357457-f1df47c6-9bf7-4ac6-8210-4782f25f4021.gif)

### Technologies used
- PHP 8.1.14
- Laravel 9.48.0
- MySQL 8.0.30

### Run project

- Clone project `git clone https://github.com/LigaLiepkalne/InfinityBank.git`

- Database setup
    - Connection configuration: copy **env.example** file, remove *example* from file name and set DB_DATABASE, DB_USERNAME, and DB_PASSWORD variables to the appropriate values.
     
    - Run `php artisan migrate` to create the necessary tables.
     - Run ```php artisan db:seed``` to seed the database with the necessary data.
    
 - Install project dependencies
    - Run `composer install` to install PHP dependencies.
    - Run `npm install` to install JavaScript dependencies.
    - Run `npm run dev` to build the front-end assets.

- Run `php artisan serve` to start the development server.
