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

// Fetch current settings
$query = "SELECT * FROM settings WHERE id = 1"; // Assuming a single settings row
$result = mysqli_query($conn, $query);
$settings = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $help_and_support = mysqli_real_escape_string($conn, $_POST['help_and_support']);
    $about_us = mysqli_real_escape_string($conn, $_POST['about_us']);

    // Update settings in the database
    $updateQuery = "UPDATE settings SET help_and_support = '$help_and_support', about_us = '$about_us' WHERE id = 1";
    mysqli_query($conn, $updateQuery);
    header("Location: settings.php"); // Redirect to the same page to see updates
}
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Settings</h4>
            <form method="POST">
                <div class="form-group">
                    <label for="help_and_support">Help and Support</label>
                    <textarea class="form-control" id="help_and_support" name="help_and_support" rows="5"><?php echo htmlspecialchars($settings['help_and_support']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="about_us">About Us</label>
                    <textarea class="form-control" id="about_us" name="about_us" rows="5"><?php echo htmlspecialchars($settings['about_us']); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
