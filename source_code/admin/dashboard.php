<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['role'] != "admin"){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h1>Admin Dashboard</h1>

<p>Welcome, <?php echo $_SESSION['fullname']; ?>!</p>

<hr>

<h3>Menu</h3>

<ul>
    <li><a href="announcements.php">Manage Announcements</a></li>
</ul>

<br>

<a href="../auth/logout.php">Logout</a>

</body>
</html>