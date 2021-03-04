#LARAVEL AUTH WITH SANCTUM

Run following commands

##GENERATING APPLICATION KEYS
-`php artisan key:generate` 

##INSTALL DEPENDENCIES
-`composer install *`

##SETUP DATABASE
`DB_DATABASE=laravel-sanctum`

##RUN MIGRATIONS
`php artisan migrate`

##RUN USER SEEDER
`php artisan db:seed --class=UserTableSeeder`

##Available routes
    routes are available in api.php
`POST ~/register`
`POST ~/login`
`GET ~/user-details`
`GET ~/logout`
