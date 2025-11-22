<?php
include "../config.php";

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM warehouse WHERE id=$id")->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['warehouse_name'];
    $location = $_POST['location'];
    $contact_person = $_POST['contact_person'];
    $contact_number = $_POST['contact_number'];

    $sql = "UPDATE warehouse SET 
                warehouse_name='$name',
                location='$location',
                contact_person='$contact_person',
                contact_number='$contact_number'
            WHERE id=$id";

    $conn->query($sql);
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Warehouse</title></head>
<body>

<h2>Edit Warehouse</h2>

<form method="POST">
    Warehouse Name: <input type="text" name="warehouse_name" value="<?= $data['warehouse_name']; ?>" required><br><br>
    Location: <input type="text" name="location" value="<?= $data['location']; ?>" required><br><br>
    Contact Person: <input type="text" name="contact_person" value="<?= $data['contact_person']; ?>"><br><br>
    Contact Number: <input type="text" name="contact_number" value="<?= $data['contact_number']; ?>"><br><br>
    <button type="submit" name="submit">Update</button>
</form>

</body>
</html>
