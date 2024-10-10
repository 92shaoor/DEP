<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Enter Information</h2>
        
        <!-- Alert Section for Success/Update/Delete Messages -->
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Record added successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <?php if (isset($_GET['updated'])) { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Record updated successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <?php if (isset($_GET['deleted'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Record deleted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <!-- Form Section -->
        <form id="userForm" action="insert.php" method="POST" class="border p-4 shadow">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Displaying Records Section -->
        <div class="mt-5">
            <h3 class="text-center">User List</h3>
            <?php
                $result = $conn->query("SELECT * FROM users");
                if ($result->num_rows > 0) {
                    echo "<table class='table table-bordered'><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td><a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p>No users found.</p>";
                }
            ?>
        </div>
    </div>

    <script>
        // Simple JS validation and alert
        $("#userForm").on("submit", function(event) {
            var name = $("#name").val();
            var email = $("#email").val();
            if (name == "" || email == "") {
                alert("Name and Email are required!");
                event.preventDefault();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
