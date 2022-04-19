

## About Project

This is 'spatie/laravel-permission' based fully functioning dynamic role based authentication system based on laravel 8.
Follow these easy steps to get started with

- Clone the repository
- Go inside the project directory
- Enter command: composer install
- Copy .env.example and create .env
- Provide database name and details in .env file
- Run command: php artisan key:generate
- Run command: php artisan optimize:clear
- Run command: php artisan migrate --seed
- Run server: php artisan serve
- Enjoy !!

## Note
If you create new controller and functions, you need to rerun the PermissionTableSeeder In order to get all the permissions available

