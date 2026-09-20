<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['id']) || $_SESSION['role'] != "admin") {
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_POST['add'])){

    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn,"INSERT INTO announcements(title,content)
    VALUES('$title','$content')");

    echo "<script>alert('Announcement Added Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Announcements</title>
</head>
<body>

<h2>Manage Announcements</h2>

<form method="POST">

Title<br>
<input type="text" name="title" required><br><br>

Content<br>
<textarea name="content" rows="5" cols="40" required></textarea><br><br>

<button type="submit" name="add">Add Announcement</button>

</form>

<hr>

<h3>Announcement List</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Content</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM announcements ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['content']; ?></td>

<td>
    <a href="edit_announcement.php?id=<?php echo $row['id']; ?>">Edit</a> |

    <a href="delete_announcement.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Delete this announcement?');">
       Delete
    </a>
</td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>