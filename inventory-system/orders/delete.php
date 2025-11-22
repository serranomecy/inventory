<?php
include "../config.php";

$id = $_GET['id'];

$conn->query("DELETE FROM orders WHERE Order_ID = $id");

header("Location: view.php");
?>
