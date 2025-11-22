<?php
include "../config.php";

// FETCH CUSTOMERS
$cust = $conn->query("SELECT * FROM customer");

// FETCH PRODUCTS
$prod = $conn->query("SELECT * FROM product");

if(isset($_POST['submit'])){
    $customer = $_POST['customer'];
    $product = $_POST['product'];
    $qty = $_POST['qty'];
    $date = $_POST['date'];

    $sql = "
        INSERT INTO orders (Customer_ID, Product_ID, Quantity, Order_Date)
        VALUES ('$customer', '$product', '$qty', '$date')
    ";

    if($conn->query($sql)){
        header("Location: view.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
</head>
<body>

<h2>Add New Order</h2>

<form method="POST">
    Customer:
    <select name="customer" required>
        <?php while($c = $cust->fetch_assoc()){ ?>
        <option value="<?= $c['Customer_ID'] ?>"><?= $c['Customer_Name'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    Product:
    <select name="product" required>
        <?php while($p = $prod->fetch_assoc()){ ?>
        <option value="<?= $p['Product_ID'] ?>"><?= $p['Product_Name'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    Quantity:
    <input type="number" name="qty" required>
    <br><br>

    Order Date:
    <input type="datetime-local" name="date" required>
    <br><br>

    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>
