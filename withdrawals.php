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
         <?php
// Database connection
include 'inc/connect.php'; // Ensure you have your database connection file

// Fetch withdrawal requests from the database
$query = "SELECT * FROM withdrawals";
$result = mysqli_query($conn, $query);

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $updateQuery = "UPDATE withdrawals SET status = 'approved' WHERE id = $id";
    mysqli_query($conn, $updateQuery);
    header("Location: withdrawals.php"); // Redirect to the same page to see updates
}

if (isset($_POST['decline'])) {
    $id = $_POST['id'];
    $updateQuery = "UPDATE withdrawals SET status = 'declined' WHERE id = $id";
    mysqli_query($conn, $updateQuery);
    header("Location: withdrawals.php"); // Redirect to the same page to see updates
}
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Withdrawal Requests</h4>
            <p class="card-description"> Manage withdrawal requests <code>as an admin</code></p>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Full Name </th>
                            <th> Status </th>
                            <th> Amount </th>
                            <th> Date </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td> <?php echo $row['id']; ?> </td>
                                    <td> <?php echo $row['full_name']; ?> </td>
                                    <td> <?php echo ucfirst($row['status']); ?> </td>
                                    <td> $ <?php echo number_format($row['amount'], 2); ?> </td>
                                    <td> <?php echo date('F d, Y', strtotime($row['date'])); ?> </td>
                                    <td>
                                        <?php if ($row['status'] === 'pending'): ?>
                                            <form method="POST" style="display: inline;">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="approve" class="btn btn-success btn-sm">Approve</button>
                                                <button type="submit" name="decline" class="btn btn-danger btn-sm">Decline</button>
                                            </form>
                                        <?php else: ?>
                                            <span class="badge badge-<?php echo $row['status'] === 'approved' ? 'success' : 'danger'; ?>">
                                                <?php echo ucfirst($row['status']); ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No withdrawal requests found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
