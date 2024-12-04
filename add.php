<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle_number = $_POST['vehicle_number'];
    $owner_name = $_POST['owner_name'];

    $sql = "INSERT INTO vehicles (vehicle_number, owner_name) VALUES ('$vehicle_number', '$owner_name')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Add New Vehicle</h1>
    <form method="POST">
        <label for="vehicle_number">Vehicle Number:</label>
        <input type="text" name="vehicle_number" required>
        <br>
        <label for="owner_name">Owner Name:</label>
        <input type="text" name="owner_name" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>