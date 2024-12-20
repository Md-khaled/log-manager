# Laravel 11 Project

A Laravel-based project with features such as logging incoming requests, optimizing database queries with eager loading, and handling `Profile` models with factories and seeders.

---

## Features

- Logs incoming requests including Request URL, HTTP Method, and Request Time.
- Optimizes database queries using eager loading to reduce unnecessary queries.
- Profile model associated with the User model, using factories and seeders for data generation.
- Custom middleware for logging request details to a custom log file (`storage/logs/custom.log`).
- Supports `/dashboard` route with applied middleware for logging requests.

---

## Technologies

- **PHP**: ^8.2
- **Laravel Framework**: ^11.31
- **MySQL
- **Faker**: For generating fake data with factories.

---

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/Md-khaled/log-manager.git
    cd log-manager
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Set up environment variables:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Configure the database in `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. Run migrations:
    ```bash
    php artisan migrate:fresh --seed
    ```

7. Seed the database with sample data:
    ```bash
    php artisan db:seed
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```

9. Access the application at:
    ``` 
    http://localhost:8000
    ```

10. For unit testing, run the following command:
    ```bash
    php artisan test
    ```

---

## Routes

### 1. Dashboard Route with Logging Middleware
**GET** `/dashboard`
This route is protected by the custom logging middleware (`incoming-request-log`). It logs the request URL, HTTP method, and request time to `storage/logs/custom.log`.
### 2. User Route with profile
**GET** `/user-profile`
---

## Features Overview

### Custom Middleware for Request Logging

- **Middleware**: `LogRequestDetails`
- **Log Details**:
    - **Request URL**
    - **HTTP Method**
    - **Request Time**

**Location of Log**: `storage/logs/custom.log`

#### How It Works:
The `LogRequestDetails` middleware logs the request details and stores them in a custom log file. It is applied to routes such as `/dashboard`.

### Optimizing Eloquent Queries with Eager Loading

Before optimization:

```php
$users = User::all();
foreach ($users as $user) {
    echo $user->profile->name;
}
