<?php
session_start();
include("../includes/db.php");

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,
    "SELECT * FROM users
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($query) > 0){

        $user = mysqli_fetch_assoc($query);

        $_SESSION['id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == "admin"){
            header("Location: ../admin/dashboard.php");
        }else{
            header("Location: ../user/dashboard.php");
        }

    }else{
        echo "<script>alert('Invalid Username or Password');</script>";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>

</form>

<br>

<a href="register.php">Create Account</a>

</body>
</html>