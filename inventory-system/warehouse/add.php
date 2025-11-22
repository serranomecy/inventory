<?php
include "../config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['warehouse_name'];
    $location = $_POST['location'];
    $contact_person = $_POST['contact_person'];
    $contact_number = $_POST['contact_number'];

    $sql = "INSERT INTO warehouse (warehouse_name, location, contact_person, contact_number)
            VALUES ('$name', '$location', '$contact_person', '$contact_number')";

    $conn->query($sql);
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Warehouse</title></head>
<body>

<h2>Add Warehouse</h2>

<form method="POST">
    Warehouse Name: <input type="text" name="warehouse_name" required><br><br>
    Location: <input type="text" name="location" required><br><br>
    Contact Person: <input type="text" name="contact_person"><br><br>
    Contact Number: <input type="text" name="contact_number"><br><br>
    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>
