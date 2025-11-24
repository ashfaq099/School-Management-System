


# School Management System

**A complete web-based platform for managing students, teachers, classes, exams, and results — built with Laravel.**

---

## 📌 Overview

**School Management System** is a role-based academic and administrative platform designed for schools.  
It centralizes operations such as student enrollment, teacher assignment, class scheduling, examinations, and result publishing.

The system provides **separate dashboards** for Admin, Teacher, and Student — making day-to-day school operations faster, cleaner, and more organized.

---

## ✨ Key Features

### 🔐 Authentication & Roles
* Secure login system
* Role-based access (Admin / Teacher / Student)
* Profile management & password update

### 🏫 Admin Features
* CRUD for Students, Teachers, Classes, Subjects
* Assign teachers to classes
* Create exam schedules
* Enter & publish results
* Manage system data from a unified dashboard

### 👨‍🏫 Teacher Features
* View assigned classes & subjects
* Manage student marks
* View student lists
* Update personal profile

### 👨‍🎓 Student Features
* View subjects, exam schedules, and results
* Manage personal profile

### 🌐 System Features
* Clean responsive UI
* Database-backed storage
* Laravel MVC architecture
* Secure middleware-based routing

---

## 🧭 How It Works

1. **Admin logs in** → Manages students, teachers, classes, and exam details.  
2. **Teacher logs in** → Views assigned classes and submits marks.  
3. **Student logs in** → Checks timetable and published results.  
4. **System processes data** → Ensures correct routing via role-specific dashboards.  
5. **All changes sync in real-time** via database-backed operations.

---

## 🔍 System Workflows

### **1. User Management Workflow**
* Admin creates accounts  
* System assigns role-based permissions  
* Users log in & receive tailored dashboards  

### **2. Class & Subject Workflow**
* Admin creates classes + subjects  
* Teachers are assigned  
* Students enroll in assigned classes  

### **3. Exam & Results Workflow**
* Admin creates exam schedules  
* Teachers input marks  
* Students view final results  


## 🧩 System Architecture

```

School-Management-System/
│
├── app/                     # Laravel application (Models, Controllers, Middleware)
├── resources/
│   └── views/               # Blade templates (UI)
│
├── public/                  # Public assets
├── routes/                  # Web routes (role-based)
├── database/
│   ├── migrations/          # Database schema
│   └── seeders/             # Demo data (optional)
│
├── vite.config.js           # Frontend build
├── composer.json            # PHP dependencies
├── package.json             # JS dependencies
│
└── README.md

````

---

## 🛠 Tech Stack

### **Backend**
* Laravel 10 (PHP 8+)
* MVC architecture
* Laravel Auth & Middleware
* Eloquent ORM
* MySQL / PostgreSQL / SQLite

### **Frontend**
* Blade Templates
* HTML, CSS, JavaScript
* Vite asset bundler

### **Development Tools**
* Composer  
* Artisan CLI  
* NPM / Yarn  

---

## 🚀 Getting Started

### Clone the repository

```bash
git clone https://github.com/ashfaq099/School-Management-System.git
cd School-Management-System
````

### Install dependencies

```bash
composer install
npm install
```

### Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials.

### Database migration

```bash
php artisan migrate
```

(If seeders exist)

```bash
php artisan db:seed
```

### Run the application

```bash
npm run dev
php artisan serve
```

Go to:

```
http://127.0.0.1:8000/
```

---

## 🧪 Testing

```bash
php artisan test
```


## 📄 License

This project is licensed under the **MIT License**.

