<?php
include 'db.php';

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle_number = $_POST['vehicle_number'];
    $owner_name = $_POST['owner_name'];

    $sql = "UPDATE vehicles SET vehicle_number='$vehicle_number', owner_name='$owner_name' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM vehicles WHERE id=$id";
$result = $conn->query($sql);
$vehicle = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Vehicle</title>
</head>
<body>
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <label for="vehicle_number">Vehicle Number:</label>
        <input type="text" name="vehicle_number" value="<?= $vehicle['vehicle_number'] ?>" required>
        <br>
        <label for="owner_name">Owner Name:</label>
        <input type="text" name="owner_name" value="<?= $vehicle['owner_name'] ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
