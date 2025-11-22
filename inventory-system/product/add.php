<?php
include "../config.php";

// Get supplier list for dropdown
$suppliers = $conn->query("SELECT * FROM Supplier");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];

    $conn->query("INSERT INTO Product (Product_Name, Category, Supplier_ID)
                  VALUES ('$name', '$category', '$supplier')");

    header("Location: view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
<link rel="stylesheet" href="../styles.css">
</head>

<body>
<h2>Add Product</h2>

<form method="POST">
    <label>Product Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" required><br><br>

    <label>Supplier:</label><br>
    <select name="supplier" required>
        <option value="">-- Select Supplier --</option>
        <?php while ($row = $suppliers->fetch_assoc()) { ?>
            <option value="<?= $row['Supplier_ID'] ?>"><?= $row['Supplier_Name'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>