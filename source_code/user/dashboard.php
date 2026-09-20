<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['role'] != "user"){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>

<h1>Welcome User!</h1>

<p>Hello, <?php echo $_SESSION['fullname']; ?></p>

<a href="../auth/logout.php">Logout</a>

</body>
</html>