# Laravel Inertia + Vue Demo Testing project

A modern blog application built with Laravel, Vue.js, and Inertia.js, using Laravel Breeze for authentication scaffolding.

## 🚀 Features

- User authentication (powered by Laravel Breeze)
- Blog post creation and management
- Clean and responsive UI with Tailwind CSS
- SPA (Single Page Application) experience with Inertia.js
- Database-driven session handling
- Queue management for background tasks
- Cache implementation for improved performance

## 🛠️ Tech Stack

- **Backend:** Laravel 10
- **Frontend:** Vue.js 3
- **Authentication:** Laravel Breeze
- **Routing/SPA:** Inertia.js
- **Styling:** Tailwind CSS
- **Database:** SQLite
- **Caching:** Database-backed cache
- **Queue:** Database queue driver

## 📋 Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- SQLite

## ⚙️ Installation

1. Clone the repository
    ```
    git clone <repository-url>
    cd <project-folder>
    ```
2. Install PHP dependencies
    ```composer install```
3. Install Laravel Breeze
    ```php artisan breeze:install```
    - Install Breeze with Vue and Inertia
4. Create environment file and generate application key
    ```cp .env.example .env```
5. Run Migrations
    ```php artisan migrate```
6. Install Node dependencies and build assets
    ```npm install```


## 🚀 Development

1. Start the Laravel development server
    `php artisan serve`
2. Start the Vite development server
    `npm run dev`

## 🔑 Authentication

Laravel Breeze provides the following features out of the box:
- User registration
- Login
- Password reset
- Email verification
- Password confirmation

All authentication views are built with Vue.js and styled with Tailwind CSS.

## 📁 Project Structure
├── resources/
│ ├── js/
│ │ ├── Components/
│ │ ├── Layouts/
│ │ ├── Pages/
│ │ └── app.js
│ └── views/
├── routes/
│ └── web.php
└── app/
└── Http/
├── Controllers/
└── Middleware/

## 🔧 Configuration

The application can be configured through the `.env` file. Key configurations include:

- `APP_NAME`: Application name
- `APP_ENV`: Application environment (local/production)
- `APP_DEBUG`: Debug mode
- `DB_CONNECTION`: Database connection type
- `QUEUE_CONNECTION`: Queue driver
- `CACHE_STORE`: Cache storage driver
- `SESSION_DRIVER`: Session storage driver
