<?php
include "../config.php";

$id = $_GET['id'];

$sql = "DELETE FROM inventory WHERE inventory_id='$id'";

if ($conn->query($sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
