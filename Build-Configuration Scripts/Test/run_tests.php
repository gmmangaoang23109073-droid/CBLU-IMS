<?php
// CBLU Connect - System Test Script
// Run this file in your browser to verify the system environment.

echo "<h2>CBLU Connect System Test</h2>";

// Test 1: PHP Version
echo "1. PHP Version: " . phpversion() . " - ";
if (version_compare(phpversion(), '8.2.0', '>=')) {
    echo "<span style='color:green;'>PASS</span><br>";
} else {
    echo "<span style='color:red;'>FAIL (Requires 8.2+)</span><br>";
}

// Test 2: MySQLi Extension
echo "2. MySQLi Extension: ";
if (extension_loaded('mysqli')) {
    echo "<span style='color:green;'>PASS</span><br>";
} else {
    echo "<span style='color:red;'>FAIL</span><br>";
}

// Test 3: Database Connection
echo "3. Database Connection: ";
$conn = @new mysqli("localhost", "root", "", "cblu_system");
if (!$conn->connect_error) {
    echo "<span style='color:green;'>PASS</span><br>";
    
    // Test 4: Check if tables exist
    $result = $conn->query("SHOW TABLES LIKE 'users'");
    echo "4. Users Table Exists: ";
    if ($result->num_rows > 0) {
        echo "<span style='color:green;'>PASS</span><br>";
    } else {
        echo "<span style='color:red;'>FAIL (Import cblu_system.sql first)</span><br>";
    }
} else {
    echo "<span style='color:red;'>FAIL (" . $conn->connect_error . ")</span><br>";
}
?>
