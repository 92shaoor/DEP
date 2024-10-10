<?php
$host = 'localhost';
$user = 'root';
$password = ''; // Add your MySQL password here
$dbname = 'crud_app';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
