<?php
// CBLU Connect - Automated Database Setup Script
// Run this file in your browser (e.g., http://localhost/cblu_connect/setup_database.php) to automatically create the database and import tables.

$host = "localhost";
$username = "root";
$password = "";

// Create connection without database
$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS cblu_system";
if ($conn->query($sql) === TRUE) {
    echo "Database 'cblu_system' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db("cblu_system");

// Read and execute the SQL file
$sql_file = file_get_contents('../../4_Data_Schema/database_schema/cblu_system.sql');
if ($conn->multi_query($sql_file)) {
    echo "Database tables imported successfully.<br>";
} else {
    echo "Error importing tables: " . $conn->error . "<br>";
}

$conn->close();
echo "<br><strong>Setup Complete! You can now delete this file.</strong>";
?>
