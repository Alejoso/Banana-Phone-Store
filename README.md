# Banana Phone Store - Laravel Project

## Description

Banana Phone Store is a web application developed using Laravel. It allows the management of different system entities through CRUD operations, user authentication, and role-based access control.

The system includes:

- User authentication (login)
- Role management (Admin and User)
- Admin panel
- Management of multiple entities
- Relational database imported from a `.sql` file

---

## Requirements

Before running the project, make sure you have installed:

- PHP >= 8.1
- Composer
- MySQL

---

## Installation and Setup

### 1. Start XAMPP

Before running the project, make sure to start XAMPP and enable the required services:

- Open the XAMPP Control Panel
- Start the following modules:
  - Apache
  - MySQL

### 2. Clone the repository

```bash
git clone (https://github.com/Alejoso/Banana-Phone-Store.git)
cd Banana-Phone-Store
```

### 3. Install dependencies 
```bash
composer install
```

### 4. Configure environment variables
```bash
cp .env.example .env
```
Then configure the database connection in the .env file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=banana_phone_store
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Import the database
The project includes a file named:
* banana_phone_store.sql
This file contains the database structure and initial data.
Import using MySQL console:
```bash
mysql -u root -p
```
Then execute:

```SQL
CREATE DATABASE banana_phone_store;
USE banana_phone_store;
SOURCE path/to/banana_phone_store.sql;
```

(If you don’t have a password, just press Enter)

### 6. Generate application key
```bash
php artisan key:generate
```

### 7. Run the server
```bash
php artisan serve
```

### Main route 
Once the server is running, access the application at:
* http://127.0.0.1:8000/

### Test Users Created 
You can log in using the following preloaded users:

#### Admin
* Email: alejotiradoramirez@gmail.com
* Password: 123

#### User 1
* Email: empanadaspor1000@gmail.com
* Password: alejito1234

#### User 2 
* Email: empanadaspor2000@gmail.com
* Password: alejito1234

### Project Structure
* app/Models → Eloquent models
* app/Http/Controllers → Controllers
* resources/views → Blade views
* routes/web.php → Application routes
* database/ → Database files

### Notes 

It is not necessary to run migrations, since the database is imported from the .sql file.
Make sure MySQL is running before importing the database.

