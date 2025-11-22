<?php
include "../config.php";

// Fetch products
$products = $conn->query("SELECT * FROM product");

// Fetch warehouses
$warehouses = $conn->query("SELECT * FROM warehouse");

// Save record when submitted
if (isset($_POST['save'])) {
    $product_id = $_POST['product_id'];
    $warehouse_id = $_POST['warehouse_id'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO inventory (product_id, warehouse_id, quantity, last_updated)
            VALUES ('$product_id', '$warehouse_id', '$quantity', NOW())";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Inventory</title>

    <style>
        body { font-family: Arial; margin: 20px; }
        .box { width: 400px; background: #f9f9f9; padding: 20px; border-radius: 8px; }
        input, select {
            width: 100%; padding: 10px; margin-bottom: 10px;
            border: 1px solid #aaa; border-radius: 5px;
        }
        .btn {
            padding: 10px; background: #007bff; color: white;
            border: none; width: 100%; border-radius: 5px; cursor: pointer;
        }
        .btn:hover { background: #0056b3; }
        .back { text-decoration: none; color: #007bff; display: block; margin-bottom: 15px; }
    </style>
</head>

<body>

<h2>Add Inventory</h2>

<a class="back" href="index.php">← Back to Inventory List</a>

<div class="box">

<form method="POST">

    <label>Product</label>
    <select name="product_id" required>
        <option value="">-- Select Product --</option>
        <?php while($row = $products->fetch_assoc()) { ?>
            <option value="<?= $row['id']; ?>"><?= $row['product_name']; ?></option>
        <?php } ?>
    </select>

    <label>Warehouse</label>
    <select name="warehouse_id" required>
        <option value="">-- Select Warehouse --</option>
        <?php while($row = $warehouses->fetch_assoc()) { ?>
            <option value="<?= $row['id']; ?>"><?= $row['warehouse_name']; ?></option>
        <?php } ?>
    </select>

    <label>Quantity</label>
    <input type="number" name="quantity" min="1" required>

    <button class="btn" type="submit" name="save">Save Inventory</button>

</form>

</div>

</body>
</html>
