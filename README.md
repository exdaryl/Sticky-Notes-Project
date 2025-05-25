# Sticky Notes – Internet Programming Project

This is a group project developed during my **Internet Programming** subject for the **Diploma in Information Technology**. The project is a sticky note web application that allows users to register, log in, and manage personal notes. The app was built using **PHP**, **Bootstrap**, **CSS**, and some **JavaScript**, with **Adminer** used as the database management tool.

## 💡 My Contribution
I was responsible for most parts of the website development, including:
- Designing the **Home Page**
- Assisting with the **All Notes** page
- Writing backend logic using **PHP**
- Implementing **user registration** and **login** features
- Developing functionality to **add and store sticky notes**
- Integrating with a **MySQL** database via **Adminer**
- Managing and organizing project files and structure

## 🛠️ Technologies Used
- PHP  
- MySQL  
- HTML  
- CSS  
- JavaScript  
- Bootstrap  
- Adminer  

## 🗃️ Database Overview
The database used is named `stickynotes`, which includes two tables:

- `users` – Stores user data  
  - Columns: `id`, `first_name`, `last_name`, `email`, `password`

- `notes` – Stores notes data  
  - Columns: `id`, `user_id`, `content`, `timestamp`

## 🚀 How to Run the Project
1. Import the database:
2. Import the `stickynotes` database into your local MySQL server.
  - Open Adminer (https://www.adminer.org/) or any MySQL client.
  - Log in to your MySQL server.
  - Create a new database named stickynotes (if it does not exist).
  - Click Import in Adminer.
  - Select the included stickynotes.sql file.
  - Click Execute to import the schema and data.

4. Configure your database connection, open database.php and update the following with your MySQL credentials:
   ```php
   // database.php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_db_username');
   define('DB_PASS', 'your_db_password');
   define('DB_NAME', 'stickynotes');
