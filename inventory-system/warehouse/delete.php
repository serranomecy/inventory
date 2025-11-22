<?php
include "../config.php";

$id = $_GET['id'];
$conn->query("DELETE FROM warehouse WHERE id=$id");

header("Location: view.php");
