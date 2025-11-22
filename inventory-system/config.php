<?php
$servername = "localhost";
$username = "root";  // adjust kung may ibang DB username
$password = "";      // adjust kung may password
$dbname = "inventory_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
