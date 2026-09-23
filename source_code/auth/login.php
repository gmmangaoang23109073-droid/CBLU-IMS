<?php
session_start();
include("../includes/db.php");

$error = "";
$username_val = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    $username_val = $username;

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == "admin") {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../user/dashboard.php");
        }
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login - CBLU Connect</title>
</head>
<body style="display:flex; justify-content:center; align-items:center; height:100vh;">

<div class="card" style="width: 100%; max-width: 400px; padding: 30px;">
    <h2 style="text-align: center; color: var(--primary-navy); margin-bottom: 20px;">CBLU Connect Login</h2>

    <?php if(!empty($error)): ?>
        <div class="alert alert-danger" style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:6px; margin-bottom:15px; border:1px solid #f87171; font-size:14px;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" id="loginForm">
        <div style="margin-bottom: 15px;">
            <label>Username</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username_val); ?>" class="<?php echo !empty($error) ? 'input-error' : ''; ?>" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label>Password</label>
            <input type="password" name="password" id="password" class="<?php echo !empty($error) ? 'input-error' : ''; ?>" required>
        </div>

        <button type="submit" name="login" class="btn" style="width: 100%; background: var(--primary-navy);">Login</button>
    </form>

    <p style="text-align: center; margin-top: 15px; font-size: 14px;">
        Don't have an account? <a href="register.php" style="color: var(--accent-blue);">Register here</a>
    </p>
</div>

</body>
</html>
