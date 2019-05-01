This is a merged application of Inventory and POS. In this application, the company can store and manage the product. Besides they also sell the product using this application.

In this application here we used several technologies: 
- Laravel 5.6
- laravel-dompdf
- AJAX
- JQuery
- Bootstrap 4
- DataTables

Installing procedure:
- Pull the repository to your desired destination.
- Then copy the .env.example as .env using this command:
 cp .env.example .env
- Then install the dependencies:
 composer install
- Then generate a key using this command:
 php artisan key:generate
- Then write database details on .env file
- After that migrate the migrations to the database :
 php artisan migrate:
- Finally, Run this application using this command:
 php artisan serve
