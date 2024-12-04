<?php
include 'db.php';

$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Parking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Vehicle Parking Entry System</h1>
    <a href="add.php">Add New Vehicle</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Vehicle Number</th>
            <th>Owner Name</th>
            <th>Entry Time</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['vehicle_number'] ?></td>
            <td><?= $row['owner_name'] ?></td>
            <td><?= $row['entry_time'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
