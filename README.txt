Notes:
Project is setup for PHP 7.3
Project uses Laravel 8.75
Project uses React 18.2.0

Setup:
-create a .env
-create an empty database and add to .env
-run "composer update"
-run "npm i"
-run "php artisan migrate"
-run "php artisan db:seed --class=TblItemsSeeder"
-run "php artisan db:seed --class=TblItemDetailsSeeder"
-run "php artisan db:seed --class=TblProductsSeeder"
-run "php artisan db:seed --class=TblProductDetailsSeeder"
-run "php artisan db:seed --class=TblUsersSeeder"
-run "npm run dev" to build the project