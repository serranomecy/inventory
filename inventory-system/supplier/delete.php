<?php
include "../config.php";

$id = $_GET['id'];

$conn->query("DELETE FROM Supplier WHERE Supplier_ID = $id");

header("Location: view.php");