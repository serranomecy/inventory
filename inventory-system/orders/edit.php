<?php
include "../config.php";

$id = $_GET['id'];

$order = $conn->query("SELECT * FROM orders WHERE Order_ID = $id")->fetch_assoc();
$cust = $conn->query("SELECT * FROM customer");
$prod = $conn->query("SELECT * FROM product");

if(isset($_POST['submit'])){
    $customer = $_POST['customer'];
    $product = $_POST['product'];
    $qty = $_POST['qty'];
    $date = $_POST['date'];

    $sql = "
        UPDATE orders SET 
            Customer_ID = '$customer',
            Product_ID = '$product',
            Quantity = '$qty',
            Order_Date = '$date'
        WHERE Order_ID = $id
    ";

    if($conn->query($sql)){
        header("Location: view.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>

<h2>Edit Order</h2>

<form method="POST">
    Customer:
    <select name="customer">
        <?php while($c = $cust->fetch_assoc()){ ?>
        <option value="<?= $c['Customer_ID'] ?>" 
            <?= ($c['Customer_ID'] == $order['Customer_ID']) ? "selected" : "" ?>>
            <?= $c['Customer_Name'] ?>
        </option>
        <?php } ?>
    </select>
    <br><br>

    Product:
    <select name="product">
        <?php while($p = $prod->fetch_assoc()){ ?>
        <option value="<?= $p['Product_ID'] ?>"
            <?= ($p['Product_ID'] == $order['Product_ID']) ? "selected" : "" ?>>
            <?= $p['Product_Name'] ?>
        </option>
        <?php } ?>
    </select>
    <br><br>

    Quantity:
    <input type="number" name="qty" value="<?= $order['Quantity'] ?>">
    <br><br>

    Order Date:
    <input type="datetime-local" name="date" 
        value="<?= date('Y-m-d\TH:i', strtotime($order['Order_Date'])) ?>">
    <br><br>

    <button type="submit" name="submit">Update</button>
</form>

</body>
</html>
