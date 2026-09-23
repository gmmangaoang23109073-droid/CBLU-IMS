<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['role'] != "admin"){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Dashboard - CBLU Connect</title>
</head>
<body>

<!-- NAVBAR WITH CLICKABLE LOGO AND SEARCH BAR -->
<div class="navbar" style="gap: 15px;">
    <!-- Clickable Logo -->
    <div class="logo">
        <a href="dashboard.php" style="color: white; text-decoration: none;">CBLU CONNECT</a>
    </div>

    <!-- Search Bar in Navbar -->
    <div style="flex: 1; max-width: 400px; margin: 0 15px;">
        <input type="text" id="dashSearchInput" onkeydown="handleSearch(event)" placeholder="🔍 Search announcements..." style="width: 100%; padding: 8px 14px; margin: 0; border: 1px solid var(--border-color); border-radius: 20px; font-size: 14px; background: #ffffff; color: var(--text-primary);">
    </div>

    <!-- Logout Button -->
    <div>
        <a href="../auth/logout.php" class="btn btn-danger" style="padding: 6px 14px;">Logout</a>
    </div>
</div>

<div class="dashboard">
    <div class="dashboard-header">
        <h1>Admin Dashboard</h1>
        <p>Welcome back, <strong><?php echo htmlspecialchars($_SESSION['fullname']); ?></strong>!</p>
    </div>

    <div class="dashboard-cards">
        <div class="card">
            <h3>Announcements</h3>
            <p>Create, update, or remove announcements for users.</p>
            <a href="announcements.php" class="btn">Manage Announcements</a>
        </div>
    </div>
</div>

<!-- SCRIPT TO REDIRECT DASHBOARD SEARCH TO ANNOUNCEMENTS -->
<script>
function handleSearch(event) {
    if (event.key === 'Enter') {
        let query = document.getElementById('dashSearchInput').value;
        if (query.trim() !== "") {
            window.location.href = "announcements.php?search=" + encodeURIComponent(query);
        }
    }
}
</script>

</body>
</html>
