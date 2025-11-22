<?php
include "../config.php";

$id = $_GET['id'];

// Fetch inventory record
$record = $conn->query("SELECT * FROM inventory WHERE inventory_id = '$id'")->fetch_assoc();

// Fetch product list
$products = $conn->query("SELECT * FROM product");

// Fetch warehouses
$warehouses = $conn->query("SELECT * FROM warehouse");

if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $warehouse_id = $_POST['warehouse_id'];
    $quantity = $_POST['quantity'];

    $sql = "
        UPDATE inventory 
        SET product_id='$product_id', warehouse_id='$warehouse_id', quantity='$quantity', 
            last_updated=NOW()
        WHERE inventory_id='$id'
    ";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Inventory</title>

    <style>
        body { font-family: Arial; margin: 20px; }
        .box { width: 400px; background: #f9f9f9; padding: 20px; border-radius: 8px; }
        input, select {
            width: 100%; padding: 10px; margin-bottom: 10px;
            border: 1px solid #aaa; border-radius: 5px;
        }
        .btn {
            padding: 10px; background: #28a745; color: white;
            border: none; width: 100%; border-radius: 5px; cursor: pointer;
        }
        .btn:hover { background: #1e7e34; }
        .back { text-decoration: none; color: #007bff; display: block; margin-bottom: 15px; }
    </style>
</head>

<body>

<h2>Edit Inventory</h2>
<a class="back" href="index.php">← Back to Inventory List</a>

<div class="box">

<form method="POST">

    <label>Product</label>
    <select name="product_id" required>
        <?php while($row = $products->fetch_assoc()) { ?>
            <option value="<?= $row['id']; ?>" <?= $row['id'] == $record['product_id'] ? 'selected' : '' ?>>
                <?= $row['product_name']; ?>
            </option>
        <?php } ?>
    </select>

    <label>Warehouse</label>
    <select name="warehouse_id" required>
        <?php while($row = $warehouses->fetch_assoc()) { ?>
            <option value="<?= $row['id']; ?>" <?= $row['id'] == $record['warehouse_id'] ? 'selected' : '' ?>>
                <?= $row['warehouse_name']; ?>
            </option>
        <?php } ?>
    </select>

    <label>Quantity</label>
    <input type="number" name="quantity" value="<?= $record['quantity']; ?>" min="1" required>

    <button class="btn" type="submit" name="update">Update Inventory</button>

</form>

</div>

</body>
</html>
