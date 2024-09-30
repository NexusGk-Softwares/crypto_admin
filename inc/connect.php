<?php
// Database connection details
$servername = "localhost"; // Change if using a different host
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$database = "power";       // Your database name

// Create a connection using mysqli
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "@";
}
?>
