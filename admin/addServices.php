<?php
// Include your database connection script
include 'connection.php';

// Check if the delete button is clicked
if (isset($_POST['delete_service'])) {
    $service_id = $_POST['service_id'];

    // Delete the service from the database
    $delete_sql = "DELETE FROM services WHERE id = $service_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Service deleted successfully.";
    } else {
        echo "Error deleting service: " . $conn->error;
    }
}

// Check if the update button is clicked
if (isset($_POST['update_service'])) {
    $service_id = $_POST['service_id'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    // Upload image and get its path (if a new image is selected)
    $new_image = $_FILES['new_image']['name'];
    $target_dir = "uploads/"; // Create a directory for image uploads
    $target_file = $target_dir . basename($_FILES['new_image']['name']);

    // Check if the image file is a valid image (if a new image is selected)
    if ($new_image != '') {
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (getimagesize($_FILES['new_image']['tmp_name']) === false) {
            echo "Invalid image file.";
            exit;
        } elseif (move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file)) {
            // Update the service in the database with the new image
            $update_sql = "UPDATE services SET image = '$new_image', heading = '$heading', content = '$content' WHERE id = $service_id";
        } else {
            echo "Error uploading image.";
            exit;
        }
    } else {
        // Update the service in the database without changing the image
        $update_sql = "UPDATE services SET heading = '$heading', content = '$content' WHERE id = $service_id";
    }

    if ($conn->query($update_sql) === TRUE) {
        echo "Service updated successfully.";
    } else {
        echo "Error updating service: " . $conn->error;
    }
}

// Check if the add services form is submitted
if (isset($_POST['add_services'])) {
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    // Upload image and get its path
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/"; // Create a directory for image uploads
    $target_file = $target_dir . basename($_FILES['image']['name']);

    // Check if the image file is a valid image
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (getimagesize($_FILES['image']['tmp_name']) === false) {
        echo "Invalid image file.";
    } elseif (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Insert data into the services table
        $sql = "INSERT INTO services (image, heading, content) VALUES ('$image', '$heading', '$content')";
        if ($conn->query($sql) === TRUE) {
            echo "Service added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
}

// Retrieve and display services in a Bootstrap table
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Management</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+k/e7Jnw2+rpsQ/g5F5n5Xg5fw" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 class="mt-4">Add Service</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="heading" class="form-label">Heading:</label>
            <input type="text" class="form-control" name="heading" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control" name="content" rows="4" required></textarea>
        </div>
        <button type="submit" name="add_services" class="btn btn-primary">Add Service</button>
    </form>

    <h2 class="mt-4">Services</h2>
    <?php
    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr><th>Image</th><th>Heading</th><th>Content</th><th>Actions</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo "<td><img src='uploads/{$row['image']}' alt='{$row['heading']}' width='100'></td>";
            echo "<td><span class='editable' data-field='heading' data-id='{$row['id']}'>{$row['heading']}</span></td>";
            echo "<td><span class='editable' data-field='content' data-id='{$row['id']}'>{$row['content']}</span></td>";
            echo '<td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal' . $row['id'] . '">Edit</button>
                  <form method="post" action="">
                      <input type="hidden" name="service_id" value="' . $row['id'] . '">
                      <button type="submit" name="delete_service" class="btn btn-danger">Delete</button>
                  </form>
              </td>';
            echo '</tr>';
            echo '<h2 class="modal-title" id="exampleModalLabel">Edit Service</h2>';

            // Edit Modal
            echo '<div class="modal fade" id="editModal' . $row['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            // echo '<h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            echo '<form method="post" action="" enctype="multipart/form-data">';
            echo '<input type="hidden" name="service_id" value="' . $row['id'] . '">';
            echo '<div class="mb-3">';
            echo '<label for="new_image" class="form-label">New Image:</label>';
            echo '<input type="file" class="form-control" name="new_image" accept="image/*">';
            echo '</div>';
            echo '<div class="mb-3">';
            echo '<label for="heading" class="form-label">Heading:</label>';
            echo "<input type='text' class='form-control' name='heading' value='{$row['heading']}' required>";
            echo '</div>';
            echo '<div class="mb-3">';
            echo '<label for="content" class="form-label">Content:</label>';
            echo "<textarea class='form-control' name='content' rows='4' required>{$row['content']}</textarea>";
            echo '</div>';
            echo '<button type="submit" name="update_service" class="btn btn-primary">Update Service</button>';
            echo '</form>';
            echo '</div>';
            echo '<div class="modal-footer">';
            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No services found.";
    }
    ?>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+k/e7Jnw2+rpsQ/g5F5n5Xg5fw" crossorigin="anonymous"></script>
<script>
    // Enable inline editing of fields
    document.querySelectorAll('.editable').forEach(function (element) {
        element.addEventListener('click', function () {
            var field = this.dataset.field;
            var id = this.dataset.id;
            var newValue = prompt('Edit ' + field, this.textContent);
            if (newValue !== null) {
                this.textContent = newValue;
                // You can also update the field in the database using AJAX
                // Example: send a POST request to update the field
                // $.post('update_field.php', { id: id, field: field, value: newValue });
            }
        });
    });
</script>
</body>
</html>
