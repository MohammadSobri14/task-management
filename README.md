# 📋 Task Management API

A RESTful API built with Laravel for managing tasks. It supports full CRUD operations, task filtering, sorting, and validation. This project is part of the Software Engineer Technical Test.

---

## 🚀 Features

- ✅ Create tasks
- 📄 View all tasks (with filtering & sorting)
- 🔍 View a specific task by ID
- ✏️ Update task
- 🗑️ Delete task
- ✅ Input validation
- 🧪 Unit testing using PHPUnit

---

## 🔧 Technologies Used

- Laravel 12
- PHP 8.x
- MySQL
- PHPUnit
- Postman

---

## 📂 API Endpoints

| Method | Endpoint           | Description               |
|--------|--------------------|---------------------------|
| POST   | `/api/tasks`       | Create a new task         |
| GET    | `/api/tasks`       | Get all tasks             |
| GET    | `/api/tasks/{id}`  | Get task by ID            |
| PUT    | `/api/tasks/{id}`  | Update existing task      |
| DELETE | `/api/tasks/{id}`  | Delete a task             |

Supports optional filtering: `category`, `priority`, `deadline_from`, `deadline_to`  
Supports sorting: `sort_by=created_at|priority|deadline`, `sort_order=asc|desc`

---

## 📦 Installation Instructions

1. **Clone the repo**:
git clone https://github.com/yourusername/task-management-api.git
cd task-management-api

2. **Install dependencies**:
composer install

3. **Environment setup**:
cp .env.example .env
php artisan key:generate

4. **Database setup**:
Edit .env and set DB credentials
php artisan migrate

5. **Run the server:**:
php artisan serve

6. **Run test cases**:
php artisan test

**📪 Postman Documentation**
You can test the API using Postman:
Download the collection: https://documenter.getpostman.com/view/34659815/2sB2x6mBzQ
Import into Postman
Base URL: http://localhost:8000
"# task-management" 
# task-management
