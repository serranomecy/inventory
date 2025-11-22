<?php
include "../config.php";

$id = $_GET['id'];

// Get product
$product = $conn->query("SELECT * FROM Product WHERE Product_ID = $id")->fetch_assoc();

// Get suppliers
$suppliers = $conn->query("SELECT * FROM Supplier");

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];

    $conn->query("UPDATE Product 
                  SET Product_Name='$name', Category='$category', Supplier_ID='$supplier'
                  WHERE Product_ID=$id");

    header("Location: view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<link rel="stylesheet" href="../styles.css">
</head>

<body>
<h2>Edit Product</h2>

<form method="POST">
    <label>Product Name:</label><br>
    <input type="text" name="name" value="<?= $product['Product_Name'] ?>" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" value="<?= $product['Category'] ?>" required><br><br>

    <label>Supplier:</label><br>
    <select name="supplier" required>
        <?php while ($row = $suppliers->fetch_assoc()) { ?>
            <option value="<?= $row['Supplier_ID'] ?>"
                <?= $product['Supplier_ID'] == $row['Supplier_ID'] ? "selected" : "" ?>>
                <?= $row['Supplier_Name'] ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
