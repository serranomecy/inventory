<?php
include "../config.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM Supplier WHERE Supplier_ID = $id");
$data = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $conn->query("UPDATE Supplier 
                  SET Supplier_Name='$name', Supplier_Phone='$phone' 
                  WHERE Supplier_ID=$id");

    header("Location: view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Supplier</title>
<link rel="stylesheet" href="../styles.css">
</head>

<body>
<h2>Edit Supplier</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= $data['Supplier_Name'] ?>" required><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?= $data['Supplier_Phone'] ?>" required><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>