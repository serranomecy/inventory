<?php
include "../config.php";

$id = $_GET['id'];

$conn->query("DELETE FROM Product WHERE Product_ID = $id");

header("Location: view.php");
