<?php
include("../includes/db.php");

if(isset($_POST['register'])){

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Username already exists!');</script>";
    }else{

        mysqli_query($conn,"INSERT INTO users(fullname, username, password, role)
        VALUES('$fullname','$username','$password','user')");

        echo "<script>
        alert('Registration Successful!');
        window.location='login.php';
        </script>";

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">

    <label>Full Name</label><br>
    <input type="text" name="fullname" required><br><br>

    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="register">Register</button>

</form>

<br>

<a href="login.php">Already have an account? Login</a>

</body>
</html>