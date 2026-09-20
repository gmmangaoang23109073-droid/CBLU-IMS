<?php
session_start();
include("../includes/db.php");

if(!isset($_SESSION['id']) || $_SESSION['role'] != "admin"){
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM announcements WHERE id='$id'");
}

header("Location: announcements.php");
exit();
?>