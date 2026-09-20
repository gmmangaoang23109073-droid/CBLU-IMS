# CBLU Information & Messaging System
# Installation and Running Guide

## 1. Applications Needed

The computer running the CBLU system needs:

- **XAMPP** — provides Apache, PHP, MySQL, and phpMyAdmin
- **Web Browser** — used to open the website
- **VS Code** — optional; used to view or edit the source code

VS Code is not required just to run the finished website.

---

## 2. Install XAMPP

Install XAMPP on the computer.

Make sure the installation includes:

- Apache
- MySQL
- PHP
- phpMyAdmin

After installation, open the **XAMPP Control Panel**.

---

## 3. Copy the Project

Copy the `cblu_system` project folder into:

```text
C:\xampp\htdocs\
```

The expected structure is:

```text
C:\xampp\htdocs\cblu_system\
├── admin/
├── auth/
├── includes/
├── user/
├── index.php
└── ...
```

Make sure the project is not accidentally placed inside an extra folder such as:

```text
C:\xampp\htdocs\cblu_system\cblu_system\
```

---

## 4. Start XAMPP

Open the XAMPP Control Panel.

Start:

- **Apache**
- **MySQL**

Both services must be running.

Apache runs the PHP website, while MySQL stores the system data.

---

## 5. Open phpMyAdmin

Open a web browser and go to:

```text
http://localhost/phpmyadmin
```

---

## 6. Import the Database

The project includes the database file:

```text
cblu_system.sql
```

In phpMyAdmin:

1. Click **Import**.
2. Click **Choose File**.
3. Select `cblu_system.sql`.
4. Scroll down.
5. Click **Import** or **Go**.
6. Confirm that the database `cblu_system` appears in the left sidebar.

The SQL file contains the database structure and the data that was exported from the development database.

---

## 7. Check the Database Connection

The database connection file is located in:

```text
includes/db.php
```

For a standard XAMPP installation, the connection normally uses:

```text
Host: localhost
Username: root
Password: blank
Database: cblu_system
```

If the MySQL configuration on the computer is different, update `db.php` accordingly.

---

## 8. Open the Website

After Apache and MySQL are running, open:

```text
http://localhost/cblu_system/
```

The CBLU website should load.

Do not open PHP files directly from Windows File Explorer. PHP pages should be accessed through Apache using `localhost`.

---

## 9. Test User Registration

1. Open the CBLU website.
2. Go to **Register**.
3. Enter the required information.
4. Submit the form.
5. Log in using the newly created account.

The registered account should be stored in the `users` table of the `cblu_system` database.

---

## 10. Test User Login

1. Open the Login page.
2. Enter the registered username and password.
3. Click **Login**.
4. The user should be redirected to the User Dashboard.

---

## 11. Test the Administrator

Log in using the administrator account created for the project.

The Admin Dashboard should provide access to:

- Manage Announcements
- Logout

---

## 12. Test Announcement CRUD

Open **Manage Announcements**.

### Create

Enter an announcement title and content, then click **Add Announcement**.

### Read

The newly created announcement should appear in the announcement list.

### Update

Click **Edit**, modify the announcement, and click **Update**.

### Delete

Click **Delete** and confirm the deletion.

The announcement should be removed from the list and database.

---

## 13. Test User and Admin Access

Log out of the administrator account.

Log in using a normal user account.

The normal user should not be able to access administrator-only pages.

The system uses session and role checking to restrict administrator functions.

---

## 14. Running the Project on Another Computer

To run the CBLU system on another computer:

1. Install XAMPP.
2. Copy the `cblu_system` project folder to `C:\xampp\htdocs\`.
3. Open XAMPP Control Panel.
4. Start Apache.
5. Start MySQL.
6. Open `http://localhost/phpmyadmin`.
7. Import `cblu_system.sql`.
8. Confirm that the `cblu_system` database exists.
9. Open `http://localhost/cblu_system/`.

The other computer does not need the original MySQL database because the SQL export can recreate the database.

---

## 15. Troubleshooting

### Problem: "Not Found"

Check that the project exists at:

```text
C:\xampp\htdocs\cblu_system
```

Then open:

```text
http://localhost/cblu_system/
```

### Problem: "Connection failed"

Check that:

- MySQL is running.
- The database is named `cblu_system`.
- `includes/db.php` contains the correct database credentials.

### Problem: phpMyAdmin does not open

Make sure Apache and MySQL are running in XAMPP.

Try:

```text
http://localhost/phpmyadmin
```

### Problem: PHP code appears as text

Do not open the `.php` file directly from File Explorer.

Use:

```text
http://localhost/cblu_system/
```

through Apache.

---

## 16. Submission Checklist

Before submitting the project, confirm that the repository contains:

- [ ] Source code
- [ ] `cblu_system.sql`
- [ ] Graphs and charts
- [ ] Screenshots
- [ ] Documentation
- [ ] `README.md`

Also test the project on another computer if possible to make sure the installation instructions work.

---

## 17. Important Academic Project Note

The CBLU Information & Messaging System is an academic Software Engineering project. The system should not be treated as a production banking application without additional security testing, secure password handling, prepared SQL statements, input validation, access-control review, and other production-level security measures.
