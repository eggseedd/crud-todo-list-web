# crud-web
  Making a CRUD (Create, Read, Update, Delete) website using laravel framework.
 
# Requirements
  - Xampp installed.
  - MySQL installed.
  - Composer for php installed.

# How to use
  **Laravel Installation**

  Make sure that you have zip, fileinfo, mysqli extension enabled and openssl disabled in the php.ini file.<br>
  First, we have to install laravel.
  
  Open terminal, then run this command below
  ```
  composer global require laravel/installer
  ```
  Go to xampp\htdocs\dashboard and run
  ```
  laravel new [project name]
  ```
  Select none for stater kit (will install breeze later) and pest (0) for testing framework

  **Laravel Configurations**

  Open the composer.json file and add this (if you're on windows)
  ```
  "config": {
    "platform": {
      "ext-pcntl": "8.3",
      "ext-posix": "8.3"
    }
  }
  ```
  Copy the .env.example and rename to .env, then adjust the DB_CONNECTION according to your database (assuming you already made a database in phpmyadmin). Check if tables like users, password_resets, migrations already exist in your database. If these tables exist, the database connection and migration are working properly.<br>
  Generate application encryption key
  ```
  php artisan key:generate
  ```

  **Breeze Installation**

  Run these following commands
  ```
  composer require laravel/breeze --dev
  php artisan breeze:install
  ```
  
