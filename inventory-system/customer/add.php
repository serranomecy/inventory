<?php
include "../config.php";

if(isset($_POST['submit'])){
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];

    $sql = "INSERT INTO inventory (product_name, category, quantity, price) VALUES ('$product_name', '$category', '$quantity', '$price')";

    if($conn->query($sql)){
        header("Location: view.php");
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
</head>
<body>
<h2>Add Inventory Item</h2>
<form method="post">
    <label>Product Name:</label><br>
    <input type="text" name="product_name" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" required><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" required><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <input type="submit" name="submit" value="Add Item">
</form>
<br>
<a href="view.php">Back to Inventory List</a>
</body>
</html>
