<?php
include '../header.php';
include "../config.php";

$table = "inventory";
$search_column = "product_name";

$search = "";
if(isset($_GET['search']) && $_GET['search'] != "") {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM $table WHERE $search_column LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM $table";
}
$result = $conn->query($sql);
?>

<div class="container" style="padding:20px;">
    <h2 style="text-align:center;">Inventory List</h2>

    <form method="GET" style="text-align:center; margin-bottom:20px;">
        <input type="text" name="search" placeholder="Search Product" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; background:white; text-align:center;">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
        <?php }} else { ?>
            <tr><td colspan="4" style="text-align:center;">No records found</td></tr>
        <?php } ?>
    </table>
</div>
