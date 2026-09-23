<?php
session_start();
include("../includes/db.php");

$errors = [];
$fullname = "";
$username = "";

if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation checks
    if (empty($fullname)) { $errors['fullname'] = "Full name is required."; }
    if (empty($username)) { $errors['username'] = "Username is required."; }
    if (empty($password)) { $errors['password'] = "Password is required."; }
    
    // Check if username already exists
    if (!empty($username)) {
        $u_check = mysqli_real_escape_string($conn, $username);
        $user_query = mysqli_query($conn, "SELECT id FROM users WHERE username='$u_check'");
        if (mysqli_num_rows($user_query) > 0) {
            $errors['username'] = "Username is already taken.";
        }
    }

    // Password matching check
    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    // If no errors, insert into DB
    if (empty($errors)) {
        $clean_fullname = mysqli_real_escape_string($conn, $fullname);
        $clean_username = mysqli_real_escape_string($conn, $username);
        $hashed_password = md5($password);
        $role = "user"; // default role

        $insert = mysqli_query($conn, "INSERT INTO users(fullname, username, password, role) VALUES('$clean_fullname', '$clean_username', '$hashed_password', '$role')");

        if ($insert) {
            header("Location: login.php?registered=1");
            exit();
        } else {
            $errors['general'] = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register - CBLU Connect</title>
</head>
<body style="display:flex; justify-content:center; align-items:center; min-height:100vh; padding: 20px 0;">

<div class="card" style="width: 100%; max-width: 420px; padding: 30px;">
    <h2 style="text-align: center; color: var(--primary-navy); margin-bottom: 20px;">Create Account</h2>

    <form method="POST" novalidate>
        <!-- FULLNAME -->
        <div style="margin-bottom: 15px;">
            <label>Full Name</label>
            <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" class="<?php echo isset($errors['fullname']) ? 'input-error' : ''; ?>">
            <?php if(isset($errors['fullname'])): ?>
                <span class="error-text"><?php echo $errors['fullname']; ?></span>
            <?php endif; ?>
        </div>

        <!-- USERNAME -->
        <div style="margin-bottom: 15px;">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="<?php echo isset($errors['username']) ? 'input-error' : ''; ?>">
            <?php if(isset($errors['username'])): ?>
                <span class="error-text"><?php echo $errors['username']; ?></span>
            <?php endif; ?>
        </div>

        <!-- PASSWORD -->
        <div style="margin-bottom: 15px;">
            <label>Password</label>
            <input type="password" name="password" class="<?php echo isset($errors['password']) ? 'input-error' : ''; ?>">
            <?php if(isset($errors['password'])): ?>
                <span class="error-text"><?php echo $errors['password']; ?></span>
            <?php endif; ?>
        </div>

        <!-- CONFIRM PASSWORD -->
        <div style="margin-bottom: 20px;">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="<?php echo isset($errors['confirm_password']) ? 'input-error' : ''; ?>">
            <?php if(isset($errors['confirm_password'])): ?>
                <span class="error-text"><?php echo $errors['confirm_password']; ?></span>
            <?php endif; ?>
        </div>

        <button type="submit" name="register" class="btn" style="width: 100%; background: var(--primary-navy);">Register</button>
    </form>

    <p style="text-align: center; margin-top: 15px; font-size: 14px;">
        Already have an account? <a href="login.php" style="color: var(--accent-blue);">Login here</a>
    </p>
</div>

</body>
</html>
