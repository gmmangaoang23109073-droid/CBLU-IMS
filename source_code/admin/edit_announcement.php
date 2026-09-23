<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['id']) || $_SESSION['role'] != "admin"){
    header("Location: ../auth/login.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, "SELECT * FROM announcements WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    mysqli_query($conn, "UPDATE announcements SET title='$title', content='$content' WHERE id='$id'");

    header("Location: announcements.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Announcement - CBLU Connect</title>
</head>
<body>

<!-- NAVBAR WITH CLICKABLE LOGO -->
<div class="navbar">
    <div class="logo">
        <a href="dashboard.php" style="color: white; text-decoration: none;">CBLU CONNECT</a>
    </div>
    <div>
        <a href="dashboard.php">Dashboard</a>
    </div>
</div>

<div class="container" style="max-width: 600px;">
    <h2>Edit Announcement</h2>

    <form method="POST">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>

        <label>Content</label>
        <textarea name="content" required><?php echo htmlspecialchars($row['content']); ?></textarea>

        <button type="submit" name="update" class="btn">Update Announcement</button>
        <a href="announcements.php" class="btn btn-secondary" style="margin-top: 10px; display: inline-block;">Cancel</a>
    </form>
</div>

</body>
</html>
