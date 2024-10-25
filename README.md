# To-do List Website

A CRUD (Create, Read, Update, Delete) website in the form of a to-do list using the Laravel framework.

## Live Demo (No CSS)

Link: https://crud-todo-list-web-production.up.railway.app/

## Requirements

- XAMPP installed
- MySQL installed
- Composer for PHP installed

## How to Use

### Laravel Installation

Make sure that you have `zip`, `fileinfo`, `mysqli` extension enabled, and `openssl` disabled in the `php.ini` file.

First, we have to install Laravel.

1. Open terminal, then run the following command:
    ```bash
    composer global require laravel/installer
    ```

2. Navigate to `xampp\htdocs\dashboard`, and run:
    ```bash
    laravel new [project name]
    ```

3. Select `none` for starter kit (we will install Breeze later) and `pest (0)` for the testing framework.

### Laravel Configurations

1. Open the `composer.json` file and add this configuration (if you're on Windows):
    ```json
    "config": {
        "platform": {
            "ext-pcntl": "8.3",
            "ext-posix": "8.3"
        }
    }
    ```

2. Copy `.env.example` and rename it to `.env`, then adjust the `DB_CONNECTION` according to your database (assuming you have already created a database in phpMyAdmin).

3. Check if tables like `users`, `password_resets`, and `migrations` exist in your database. If these tables exist, the database connection and migration are working properly.

4. Generate an application encryption key:
    ```bash
    php artisan key:generate
    ```

### Breeze Installation

Run the following commands:

```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

### NPM Installation

Run the following commands:

```bash
npm install
```

### Laravel Configurations

1. Make sure Apache and MySQL are running in XAMPP.

2. Open two different terminals and run the following commands:

    Terminal 1:
    ```bash
    npm run dev
    ```
    Terminal 2:
    ```bash
    php artisan serve
    ```

Now, you can access your web through the `APP_URL` shown in the terminal where you ran `npm run dev`.
