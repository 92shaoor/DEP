<?php
include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?updated=1");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
