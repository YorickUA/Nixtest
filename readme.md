Hello.

In order to setup application you need to do bower install and composer install. Index.php is in "public" folder. You probably need to edit .env file for database connection. After that run "php artisan migrate" for db table creation and "php artisan ds:seed" for initial table population. Don't forget to run webserver. I did made this project in xampp.
