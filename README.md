This is a basic Laravel Jetstream CRUD app with user login and registering for testing

To install it on a local test server first install Composer for your platform

Create a project:
    composer create-project --prefer-dist laravel/laravel Laravel-Basic-CRUD
    cd Laravel-Basic-CRUD
    composer require laravel/Jetstream
    composer require livewire/livewire
    php artisan jetstream:install livewire
    php artisan livewire:publish --assets

I am using postgresSQL installed locally in this example

Create a database "LaravelBasicCRUD"

Edit your .env file for your database settings

The default is this:

    DB_CONNECTION=sqlite
    
    # DB_HOST=127.0.0.1
    
    # DB_PORT=3306
    
    # DB_DATABASE=laravel
    
    # DB_USERNAME=root
    
    # DB_PASSWORD=

Change it to your settings for your database

    DB_CONNECTION=pgsql
    
    DB_HOST=127.0.0.1
    
    DB_PORT=5432
    
    DB_DATABASE=LaravelBasicCRUD
    
    DB_USERNAME=postgresUsername
    
    DB_PASSWORD=adminPassword

Delete the files in /database/migrations

Copy the files in Laravel-Basic-CRUD from GitHub to the Laravel-Basic-CRUD directory

Run the migrations to initialize the database:

    php artisan migrate:fresh

Clear all the caches:
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    php artisan event:clear
    php artisan optimize:clear

Set up your Vite resources:

    npm install
    npm run dev

In another shell change to the project directory and start the test server:
    
    php artisan serve

Go to http://127.0.0.1:8000/






