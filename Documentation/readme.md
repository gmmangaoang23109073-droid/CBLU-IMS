CBLU Information & Messaging System

Corporate Bank of La Union

The CBLU Information & Messaging System is a web-based PHP and MySQL application developed for the Corporate Bank of La Union. The system provides user registration and login, role-based access for administrators and users, and announcement management.

Members
- Chelsea Torres
- Carlo Daniel Javier
- Glaiza Mangaoang

Main Features
-User Registration
-User Login
-Admin Login
-User and Admin role access
-Admin Dashboard
-User Dashboard
-Announcement Management
-Create, Read, Update, and Delete (CRUD) announcements
-MySQL database integration

Technologies Used
-PHP
-MySQL
-HTML
-XAMPP
-Apache
-phpMyAdmin

Requirements
To run the system locally, install:
1. XAMPP
2. A modern web browser such as Google Chrome, Microsoft Edge, Mozilla Firefox, or Opera

VS Code is optional and is only needed if you want to edit the source code.

Quick Installation
1. Install XAMPP.
2. Copy the cblu_system project folder into C:\xampp\htdocs\.
3. Open XAMPP Control Panel.
4. Start Apache and MySQL.
5. Open http://localhost/phpmyadmin.
6. Import the provided cblu_system.sql database.
7. Open http://localhost/cblu_system/ in a web browser.
8. Register a user account or log in using an existing account.
9. Log in as an administrator to access announcement management.

Project Structure
cblu_system/
├── admin/
├── auth/
├── includes/
├── user/
├── index.php
└── ...

Database
The project uses a MySQL database named:
cblu_system
The database export is provided as:
cblu_system.sql
Import this SQL file through phpMyAdmin before running the system.

Admin Functions
-The administrator can:
-Access the Admin Dashboard
-Manage announcements
-Add announcements
-View announcements
-Edit announcements
-Delete announcements
-Log out

User Functions
-Users can:
-Register an account
-Log in
Access the User Dashboard
-View available system information
-Log out

Running the Project on Another Computer
The project can be transferred to another computer by installing XAMPP, copying the project into htdocs, importing cblu_system.sql through phpMyAdmin, and starting Apache and MySQL.
See documentation/Installation_Guide.md for the complete procedure.

Notes
The system is intended as a Software Engineering academic project and should be reviewed and secured further before being used in a real production banking environment.
