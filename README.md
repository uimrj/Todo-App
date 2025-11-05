# 📝 Laravel To-Do App

![Laravel](https://img.shields.io/badge/Laravel-10.x-ff2d20?style=for-the-badge\&logo=laravel\&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-^8.2-blue?style=for-the-badge\&logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/Database-MySQL-blue?style=for-the-badge\&logo=mysql\&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green?style=for-the-badge)

---

## 🚀 Project Overview

This **Laravel To-Do App** is a simple and efficient task management tool that allows users to **create**, **update**, **view**, and **delete** tasks easily.
It’s built using **Laravel**, a modern PHP framework, and follows clean, maintainable code practices.

---

## ⚙️ Installation & Setup

Follow these steps to run the project on your local system:

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/your-username/Todo-App.git
cd Todo-App
```

### 2️⃣ Create Database

* Open your MySQL or phpMyAdmin
* Create a new database named:

  ```
  todo_list
  ```

### 3️⃣ Configure `.env`

Copy the example environment file and update your DB credentials:

```bash
cp .env.example .env
```

Then edit these lines inside `.env`:

```
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Run Migrations

```bash
php artisan migrate
```

### 5️⃣ Start the Server

```bash
php artisan serve
```

The app will now be running at:
👉 **[http://localhost:8000](http://localhost:8000)**

---

## 🧩 Features

✅ Add new tasks
✅ View all tasks
✅ Update existing tasks
✅ Delete tasks
✅ Simple and responsive UI

---

## 🖼️ Screenshot (optional)

*(You can add an image here once you have a UI screenshot)*

```md
![App Screenshot](public/images/screenshot.png)
```

---

## 🛠️ Tech Stack

* **Framework:** Laravel 10
* **Language:** PHP 8.2+
* **Database:** MySQL
* **Frontend:** Blade Templates, Bootstrap

---

## 🧑‍💻 Author

**Rishabh Jain**
📧 [uimrj45@gmail.com](mailto:uimrj45@gmail.com)
🌐 [GitHub Profile](https://github.com/uimrj)

---

## 📜 License

This project is licensed under the **MIT License** – feel free to use and modify it.

---

⭐ *If you like this project, consider giving it a star on GitHub!*
