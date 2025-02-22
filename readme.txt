# Game API - Laravel Backend

## Overview
The **Game API** is a backend application built with Laravel that allows users to manage a collection of video games. It supports authentication, CRUD operations on games, and user roles with permissions.

## Features
- **User Authentication** (Registration, Login, Logout) with Laravel Sanctum
- **Game Management** (Create, Read, Update, Delete)
- **User Roles** (Admin & Regular User)
- **SQLite Database Integration**
- **Validation for Requests**
- **API Documentation with Postman**

## Prerequisites
Ensure you have the following installed:
- PHP 8.1
- Composer 2.6
- Laravel 10.2
- SQLite Database

## Installation

### 1. Clone the Repository
```sh
git clone <repository_url>
cd game_api
```

### 2. Install Dependencies
```sh
composer install
```

### 3. Configure Environment
Copy the `.env.example` file to `.env`:
```sh
cp .env.example .env
```
Edit `.env` and set up the database:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
DB_FOREIGN_KEYS=true
```

### 4. Run Migrations
```sh
php artisan migrate
```

### 5. Generate Application Key
```sh
php artisan key:generate
```

### 6. Start the Server
```sh
php artisan serve
```
Access the API at `http://127.0.0.1:8000/api/`

## API Endpoints

### **Authentication**
- **Register**: `POST /api/register`
- **Login**: `POST /api/login`
- **Logout**: `POST /api/logout`
  - Requires Authentication Header:
    ```
    Authorization: Bearer generated_token_here
    ```

### **Game Management** (Requires Authentication)
- **Get All Games**: `GET /api/games`
- **Add a New Game**: `POST /api/games`
  - Request Body:
    ```json
    {
      "title": "Game Title",
      "description": "Game description",
      "release_date": "2024-02-01",
      "genre": "Action"
    }
    ```
- **Update a Game**: `PUT /api/games/{id}`
- **Delete a Game** (Admin only): `DELETE /api/games/{id}`

## About postman
In ../VideoGame-Management-System-API/Post Man Json there is a json file which include the test "runs" for the api
To test it on your own see the json for data examples and header needs for each endpoint



