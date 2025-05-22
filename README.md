# Laravel Takehome Assessment

A simple Laravel project to manage companies with basic admin authentication and CRUD functionality.

-   **Tech Stack**
    -   Laravel 11
    -   Laravel Breeze (Blade version)
    -   Tailwind CSS (via Breeze)
    -   PHP 8.2+
    -   MySQL 5.7

## 🚀 Setup Instructions

1. **Clone & Install Dependencies**

    ```bash
    git clone https://github.com/0xaiman/company_management_system.git
    cd twoq-assessment
    composer install
    npm install && npm run dev
    ```

2. **Setup Environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    - Configure `.env` with your DB credentials.

3. **Run Migrations & Seeders**

    ```bash
    php artisan migrate --seed
    php artisan storage:link
    ```

4. **Start the App**
    ```bash
    php artisan serve
    ```
    Visit [http://localhost:8000](http://localhost:8000) and log in as admin.

## 🔧 Troubleshooting

### MySQL Collation Issues

If you encounter MySQL collation errors during migration, update the collation in `config/database.php`:

```php
'mysql' => [
    // ... other config ...
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
    // ... other config ...
]
```

This ensures compatibility with MySQL 5.7 and older versions.

---

**Demo Admin:**
`admin@admin.com`
`password`
