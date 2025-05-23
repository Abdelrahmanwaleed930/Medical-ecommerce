
# Mini Medical E-Commerce (Laravel + Blade + MySQL)

## Features

- Public product listing, cart, and guest checkout
- Admin panel for product/order management (Laravel Breeze)
- Product change logging with observer
- Seeders/factories for test data

## Quick Start

1. **Clone the repo:**
    ```bash
    git clone https://github.com/YOUR_USERNAME/medical-ecommerce.git
    cd medical-ecommerce
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install && npm run dev
    ```

3. **Set up environment:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure DB in `.env` and run migrations + seeders:**
    ```bash
    php artisan migrate --seed
    ```

5. **Install Laravel Breeze (if not present):**
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install && npm run dev
    php artisan migrate
    ```

6. **Run the server:**
    ```bash
    php artisan serve
    ```

## Test Login

- **Admin:** `admin@example.com`
- **Password:** `password`

## Project Structure

- **app/Http/Controllers/**: Controllers for public and admin
- **app/Models/**: Eloquent models
- **app/Observers/**: Product logging logic
- **resources/views/**: Blade templates
- **database/seeders/**: Seeders for test data

## Developer Notes

- Use `php artisan make:model`, `make:controller`, etc. to extend
- To add product image uploads, see Laravel file upload docs
- Extendable by adding new models or features per Laravel best practices
