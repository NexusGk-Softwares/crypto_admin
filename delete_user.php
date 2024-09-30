<?php
include 'inc/connect.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id='$id'";
    mysqli_query($conn, $query);
    echo "User deleted successfully.";
}
?>
