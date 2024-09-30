<?php
include 'inc/connect.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $company_name = $_POST['company_name'];
    $status = $_POST['status'];

    $query = "UPDATE users SET customer_name='$customer_name', company_name='$company_name', status='$status' WHERE id='$id'";
    mysqli_query($conn, $query);
    echo "User updated successfully.";
}
?>
