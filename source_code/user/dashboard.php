<?php
session_start();
include("../includes/db.php");

// Check kung naka-login ang user (admin man o normal user)
if(!isset($_SESSION['id'])){
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
    <title>User Dashboard - CBLU Connect</title>
</head>
<body>

<!-- NAVBAR WITH SEARCH BAR -->
<div class="navbar" style="gap: 15px;">
    <!-- Clickable Logo -->
    <div class="logo">
        <a href="dashboard.php" style="color: white; text-decoration: none;">CBLU CONNECT</a>
    </div>

    <!-- Search Bar -->
    <div style="flex: 1; max-width: 400px; margin: 0 15px;">
        <input type="text" id="searchInput" onkeyup="filterAnnouncements()" placeholder="🔍 Search announcements..." style="width: 100%; padding: 8px 14px; margin: 0; border: 1px solid var(--border-color); border-radius: 20px; font-size: 14px; background: #ffffff; color: var(--text-primary);">
    </div>

    <!-- User Profile & Logout -->
    <div style="display: flex; align-items: center; gap: 15px;">
        <span style="font-size: 14px; color: #cfe8ff;">Hi, <?php echo htmlspecialchars($_SESSION['fullname']); ?></span>
        <a href="../auth/logout.php" class="btn btn-danger" style="padding: 6px 14px;">Logout</a>
    </div>
</div>

<div class="container">

    <!-- HERO / INTRO SECTION -->
    <div class="dashboard-header" style="border-left: 5px solid var(--accent-blue);">
        <h1 style="margin-bottom: 10px;">Welcome to Cooperative Bank of La Union</h1>
        <p style="color: var(--text-muted); font-size: 15px;">
            Providing reliable, secure, and modern financial services across La Union. <strong>CBLU Connect</strong> keeps you updated with our latest bank advisories, promos, and community announcements.
        </p>
    </div>

    <!-- ANNOUNCEMENTS SECTION (READ-ONLY) -->
    <div style="margin-bottom: 30px;">
        <h2 style="margin-bottom: 15px; color: var(--primary-navy);">Latest Announcements</h2>

        <div id="announcementContainer">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM announcements ORDER BY id DESC");
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class="announcement announcement-item">
                    <h3 class="announcement-title" style="color: var(--primary-navy);"><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p class="announcement-content"><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                </div>
            <?php 
                }
            } else {
                echo "<p style='color: var(--text-muted);'>No announcements posted yet.</p>";
            }
            ?>
        </div>
    </div>

    <!-- LOCATION & MAP SECTION -->
    <div style="background: var(--card-bg); padding: 25px; border-radius: var(--radius); border: 1px solid var(--border-color); box-shadow: var(--shadow-md); margin-bottom: 40px;">
        <h2 style="margin-bottom: 15px; color: var(--primary-navy);">Visit Our Office</h2>
        
        <div style="line-height: 1.8; color: var(--text-primary); margin-bottom: 20px; font-size: 14px;">
            <p>📍 <strong>Main Office:</strong> CBLU Building, National Highway, Barangay Sta. Barbara, Agoo, La Union</p>
            <p>📞 <strong>Phone Numbers:</strong> (072) 521-0006 / (072) 682-2228 / (072) 682-2227</p>
            <p>📱 <strong>Mobile Numbers:</strong> 0920 518 3442 / 0919 993 0090</p>
            <p>📧 <strong>Email Address:</strong> coopbanklaunion@rbap.org</p>
        </div>

        <!-- Embedded Google Map centered on Agoo, La Union -->
        <div style="width: 100%; height: 350px; border-radius: var(--radius); overflow: hidden; border: 1px solid var(--border-color);">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4731.353486785576!2d120.36411927591055!3d16.325179732533535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391770d6af9302d%3A0xd8891087885b942d!2sCooperative%20Bank%20of%20La%20Union!5e1!3m2!1sen!2sph!4v1789389784902!5m2!1sen!2sph" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="strict-origin-when-cross-origin">
        </iframe>
    </div>
</div>

</div>

<!-- FOOTER WITH QUICK LINKS -->
<footer style="background: var(--primary-navy); color: white; padding: 40px 10%; margin-top: 50px;">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 30px; text-align: left; max-width: 1100px; margin: 0 auto;">
        
        <!-- Column 1: Info -->
        <div style="flex: 1; min-width: 250px;">
            <h3 style="color: var(--accent-gold); margin-bottom: 12px;">CBLU CONNECT</h3>
            <p style="font-size: 14px; color: #cbd5e1; line-height: 1.6;">
                Official web portal of Cooperative Bank of La Union. Serving our local community with trust and financial excellence.
            </p>
        </div>

        <!-- Column 2: Quick Links -->
        <div style="flex: 1; min-width: 200px;">
            <h4 style="color: white; margin-bottom: 12px;">Quick Links</h4>
            <ul style="list-style: none; line-height: 2;">
                <li><a href="dashboard.php" style="color: #cbd5e1;">Home Dashboard</a></li>
                <li><a href="#searchInput" style="color: #cbd5e1;">Announcements</a></li>
                <li><a href="../auth/logout.php" style="color: #cbd5e1;">Logout Account</a></li>
            </ul>
        </div>

        <!-- Column 3: Contact Info -->
        <div style="flex: 1; min-width: 250px;">
            <h4 style="color: white; margin-bottom: 12px;">Contact Us</h4>
            <p style="font-size: 13px; color: #cbd5e1; line-height: 1.8;">
                📍 Sta. Barbara, Agoo, La Union<br>
                📞 (072) 521-0006<br>
                📱 0920 518 3442<br>
                📧 <a href="mailto:coopbanklaunion@rbap.org" style="color: var(--accent-gold);">coopbanklaunion@rbap.org</a>
            </p>
        </div>

    </div>

    <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 30px 0 20px 0;">
    <p style="font-size: 13px; color: #94a3b8; margin: 0; text-align: center;">&copy; <?php echo date('Y'); ?> Cooperative Bank of La Union. All Rights Reserved.</p>
</footer>

<!-- LIVE SEARCH SCRIPT FOR CARDS -->
<script>
function filterAnnouncements() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let cards = document.getElementsByClassName("announcement-item");

    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].getElementsByClassName("announcement-title")[0];
        let content = cards[i].getElementsByClassName("announcement-content")[0];
        
        if (title || content) {
            let titleText = title.textContent || title.innerText;
            let contentText = content.textContent || content.innerText;
            
            if (titleText.toLowerCase().indexOf(filter) > -1 || contentText.toLowerCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
}
</script>

</body>
</html>
