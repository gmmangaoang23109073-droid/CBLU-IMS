<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['id']) || $_SESSION['role'] != "admin"){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM announcements WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn, "UPDATE announcements
                         SET title='$title',
                             content='$content'
                         WHERE id='$id'");

    header("Location: announcements.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcement</title>
</head>
<body>

<h2>Edit Announcement</h2>

<form method="POST">

Title<br>
<input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>

Content<br>
<textarea name="content" rows="5" cols="40" required><?php echo $row['content']; ?></textarea><br><br>

<button type="submit" name="update">Update</button>

</form>

<br>

<a href="announcements.php">Back</a>

</body>
</html>