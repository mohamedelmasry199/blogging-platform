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
<h2>Documentation:</h2>
"https://documenter.getpostman.com/view/29187226/2sAXqv6MUs"


<h2>Setup Instructions:</h2>
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




<h1>Project Workflow Summary:</h1>

Form Request Adjustment:
The initial step involved adjusting the form request to interact smoothly with the API. I created custom API Requests that extend Laravel's FormRequest. These requests ensure that incoming data is validated before being passed to the service layer.
Architecture Setup:

To maintain clean and scalable code, I implemented a Service-Oriented Architecture using:
Interfaces: To define the contracts for the functionality.
Repositories: For data interaction with the database, following the Repository Pattern to abstract database logic.
Services: Where the business logic resides. The services handle core application logic and interact with repositories.
Controllers: The controllers receive the requests, pass them through the services, and return appropriate responses.
Login and Registration Implementation:

The first functional implementation focused on user authentication. I created the necessary form requests, interfaces, repositories, services, and controllers for:
Registration: Allows authors to register by validating and storing their data in the database.
Login: Enables authors to authenticate and generate a session token.
Author Functionality (Article Management):

After completing user authentication, I moved on to article management for authors, following the same architecture setup (Requests, Interfaces, Repositories, Services, Controllers). Key steps included:
Creating Articles:
I used a DTO (Data Transfer Object) to handle data manipulation and ensure clean data transfer between layers, making the code more maintainable and structured.
Returning Data:
I leveraged Laravel Resources to format the response data, ensuring that the API outputs were consistent and properly structured when returning article lists, view counts, and other information.
Developed endpoints for authors to:
Retrieve a list of their articles.
Create new articles.
Activate or deactivate an article.
Make articles featured.

Reader Functionality:
Finally, I implemented reader functionalities, ensuring that users can interact with the content. Following the same architecture pattern, I created:
Form requests for reader interactions.
Resources to format responses, ensuring that reader-facing data, such as featured articles or article details, were returned in a consistent, structured format.
Developed API endpoints for readers to:
Retrieve a list of featured articles.
View specific articles.
Like or dislike articles.
API Testing and Documentation:

After implementing each major feature (Login, Registration, Article Management, Reader Functionality), I thoroughly tested the API using Postman. This ensured that all endpoints functioned as expected and matched the documented API specifications

