<?php @require("inc/connect.php");?>
<?php
// Assuming the database connection is already established ($conn)

if (isset($_POST['approve'])) {
    $deposit_id = $_POST['deposit_id'];

    // Update the deposit status to 'approved'
    $approve_query = "UPDATE deposits SET status='approved' WHERE id='$deposit_id'";
    if (mysqli_query($conn, $approve_query)) {
        echo "<script>alert('Deposit approved successfully'); window.location.href='deposits.php';</script>";
    } else {
        echo "<script>alert('Error approving deposit');</script>";
    }
}

if (isset($_POST['decline'])) {
  $deposit_id = $_POST['deposit_id'];

  if (isset($_POST['decline'])) {
    $deposit_id = $_POST['deposit_id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE deposits SET status = ? WHERE id = ?");
    $status = 'rejected';
    $stmt->bind_param("si", $status, $deposit_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Deposit declined successfully'); window.location.href='deposits.php';</script>";
    } else {
        echo "<script>alert('Error declining deposit: " . $stmt->error . "');</script>";
    }

    // Close the statement
    $stmt->close();
}

}
?>

<?php @include("header.php");?>
  <body class="with-welcome-text">
    <div class="container-scroller">
       
      <!-- partial:partials/_navbar.html -->
 <?php @include("inc/navbar.php");?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
         <?php @include("inc/sidebar1.php");?>
         <?php @include("plugin.php");?>
         <div class="col-lg-12 grid-margin stretch-card">
         <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Available Deposits</h4>
            <p class="card-description">Manage deposit requests</p>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Full Name </th>
                            <th> Amount </th>
                            <th> Date </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch deposits from the database
                        $query = "SELECT * FROM deposits";
                        $result = mysqli_query($conn, $query);
                        $count = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['full_name'];
                            $amount = $row['amount'];
                            $date = $row['created_at'];
                            $status = $row['status'];

                            echo "<tr>
                                    <td>{$count}</td>
                                    <td>{$name}</td>
                                    <td>\${$amount}</td>
                                    <td>{$date}</td>
                                    <td>{$status}</td>
                                    <td>
                                    <form method='POST'>
                                        <input type='hidden' name='deposit_id' value='<?php echo $id; ?>'>
                                        <button type='submit' name='approve' class='btn btn-success btn-sm'>Approve</button>
                                        <button type='submit' name='decline' class='btn btn-danger btn-sm'>Decline</button>
                                    </form>
                                </td>

                                  </tr>";
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
