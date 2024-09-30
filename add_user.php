<?php
include 'inc/connect.php';  // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $company_name = $_POST['company_name'];
    $status = $_POST['status'];

    // Prepare and execute the insert statement
    $stmt = $conn->prepare("INSERT INTO users (customer_name, company_name, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $customer_name, $company_name, $status);

    if ($stmt->execute()) {
        echo "User added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
