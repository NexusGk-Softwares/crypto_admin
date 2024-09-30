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
include 'inc/connect.php';  // Ensure this file has your DB connection code

// Fetch users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->
    <title>Manage Users</title>
</head>
<body>

<div class="container">
    <h4 class="my-4">Manage Users</h4>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMemberModal">Add New Member</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['customer_name']; ?>" data-username="<?php echo $row['company_name']; ?>" data-status="<?php echo $row['status']; ?>" data-toggle="modal" data-target="#editMemberModal">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row['id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberModalLabel">Add New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addMemberForm">
                    <div class="form-group">
                        <label for="customer_name">Full Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="company_name">Username</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Verified">Verified</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Member Modal -->
<div class="modal fade" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="editMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMemberModalLabel">Edit Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editMemberForm">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_customer_name">Full Name</label>
                        <input type="text" class="form-control" id="edit_customer_name" name="customer_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_company_name">Username</label>
                        <input type="text" class="form-control" id="edit_company_name" name="company_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Verified">Verified</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Member</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Add Member
    $('#addMemberForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'add_user.php',
            data: $(this).serialize(),
            success: function(response) {
                alert('User added successfully.');
                location.reload();
            },
            error: function() {
                alert('Error adding member.');
            }
        });
    });

    // Edit Member
    $('.edit-btn').on('click', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const username = $(this).data('username');
        const status = $(this).data('status');

        $('#edit_id').val(id);
        $('#edit_customer_name').val(name);
        $('#edit_company_name').val(username);
        $('#edit_status').val(status);
    });

    $('#editMemberForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'edit_user.php', // Ensure this file exists and is correct
            data: $(this).serialize(),
            success: function(response) {
                alert('User updated successfully.');
                location.reload();
            },
            error: function() {
                alert('Error updating member.');
            }
        });
    });

    // Delete Member
    $('.delete-btn').on('click', function() {
        const id = $(this).data('id');
        if (confirm('Are you sure you want to delete this member?')) {
            $.ajax({
                type: 'POST',
                url: 'delete_user.php', // Ensure this file exists and is correct
                data: { id: id },
                success: function(response) {
                    alert('User deleted successfully.');
                    location.reload();
                },
                error: function() {
                    alert('Error deleting member.');
                }
            });
        }
    });
});
</script>

</body>
</html>
    