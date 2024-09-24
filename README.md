<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
Task Overview
This project is a RESTful API for a Blogging Platform built using Laravel. It supports two types of users: readers (end users) and writers (authors). Authors can manage their articles, while readers can interact with featured content.

Requirements
1. User Authentication
Authors can:
Register a new account.
Log in to authenticate and obtain a session token.
2. Author Functionality
Authors can manage their articles by:
Retrieving a list of articles, including view counts.
Creating a new article.
Activating or deactivating an article.
Marking an article as featured.
3. Reader Functionality
Readers can:
Retrieve a list of featured articles from random authors.
View specific articles.
Like or dislike an article.
4. Architectural Considerations
The project uses Service Architecture, DTOs (Data Transfer Objects), and the Repository Pattern.
The design adheres to SOLID principles, ensuring scalability and maintainability.
Postman API Collection
To test the API endpoints, you can use the following Postman collection:

"https://winter-capsule-555145.postman.co/workspace/social-networking-app~9fccab93-1604-4aa3-9801-a1c07114acb3/collection/29187226-f22ff1af-d0d3-44ac-85d1-fde336aa233b?action=share&creator=29187226"
This collection includes all the available API endpoints for testing.

Setup Instructions
1. Prerequisites
Ensure you have the following installed:

PHP 8.x or higher
Composer
MySQL or any supported database
Laravel 9.x or higher
Postman (for API testing)
2. Installation Steps
Clone the repository:



git clone https://github.com/your-repository/blogging-platform.git
cd blogging-platform
Install dependencies:



composer install
Copy the environment file:



cp .env.example .env
Generate an application key:



php artisan key:generate
Set up the database:

Open the .env file and configure your database settings:

plaintext

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
Run database migrations:



php artisan migrate
php artisn db:seed
Run the application:



php artisan serve
The application will be available at http://localhost:8000.

