<?php
include "../config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $conn->query("INSERT INTO Supplier (Supplier_Name, Supplier_Phone)
                  VALUES ('$name', '$phone')");
    header("Location: view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Supplier</title>
<link rel="stylesheet" href="../styles.css">
</head>

<body>
<h2>Add Supplier</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" required><br><br>

    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>
