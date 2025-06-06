<?php
$servername = "localhost"; // Use 'localhost' for XAMPP
$username = "root";        // Default username
$password = "";            // Default password (empty)
$dbname = "lms2";   

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
