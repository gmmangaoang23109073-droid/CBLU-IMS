<?php
session_start();
include("../includes/db.php");

if (!isset($_SESSION['id']) || $_SESSION['role'] != "admin") {
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_POST['add'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    mysqli_query($conn, "INSERT INTO announcements(title, content) VALUES('$title', '$content')");
    $msg = "Announcement added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Manage Announcements - CBLU Connect</title>
</head>
<body>

<!-- NAVBAR WITH SEARCH BAR -->
<div class="navbar" style="gap: 15px;">
    <!-- Clickable Logo (Babalik sa Dashboard) -->
    <div class="logo">
        <a href="dashboard.php" style="color: white; text-decoration: none;">CBLU CONNECT</a>
    </div>

    <!-- Search Bar in Navbar -->
    <div style="flex: 1; max-width: 400px; margin: 0 15px;">
        <input type="text" id="searchInput" onkeyup="filterAnnouncements()" placeholder="🔍 Search announcements..." style="width: 100%; padding: 8px 14px; margin: 0; border: 1px solid var(--border-color); border-radius: 20px; font-size: 14px; background: #ffffff; color: var(--text-primary);">
    </div>

    <!-- Logout Button -->
    <div>
        <a href="../auth/logout.php" class="btn btn-danger" style="padding: 6px 14px;">Logout</a>
    </div>
</div>

<div class="container">
    <h2>Manage Announcements</h2>

    <?php if(isset($msg)): ?>
        <div class="alert alert-success"><?php echo $msg; ?></div>
    <?php endif; ?>

    <!-- ADD ANNOUNCEMENT FORM -->
    <form method="POST">
        <label>Title</label>
        <input type="text" name="title" required>

        <label>Content</label>
        <textarea name="content" required></textarea>

        <button type="submit" name="add" class="btn">Add Announcement</button>
    </form>

    <h3 style="margin-bottom: 15px;">Announcement List</h3>

    <!-- TABLE CONTAINER -->
    <div class="table-container">
        <table id="announcementsTable">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM announcements ORDER BY id DESC");
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($row['title']); ?></strong></td>
                    <td><?php echo htmlspecialchars($row['content']); ?></td>
                    <td>
                        <a href="edit_announcement.php?id=<?php echo $row['id']; ?>" class="btn" style="padding: 4px 8px; font-size: 12px;">Edit</a>
                        <a href="delete_announcement.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;" onclick="return confirm('Delete this announcement?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <br>
    <a href="dashboard.php">&larr; Back to Dashboard</a>
</div>

<!-- LIVE SEARCH SCRIPT -->
<script>
function filterAnnouncements() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let table = document.getElementById("announcementsTable");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let tdTitle = tr[i].getElementsByTagName("td")[1];
        let tdContent = tr[i].getElementsByTagName("td")[2];
        if (tdTitle || tdContent) {
            let titleText = tdTitle.textContent || tdTitle.innerText;
            let contentText = tdContent.textContent || tdContent.innerText;
            if (titleText.toLowerCase().indexOf(filter) > -1 || contentText.toLowerCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

</body>
</html>
