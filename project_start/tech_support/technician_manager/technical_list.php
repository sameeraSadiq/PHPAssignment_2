<?php
require('../model/database.php');
include '../view/header.php';

$query = 'SELECT * FROM technicians';
$statement = $db->prepare($query);
$statement->execute();
$technicians = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsPro Technical Support</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px 10px;
            text-align: left;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        
        a {
            display: inline-block;
            font-weight: 700;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Technician List</h1>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td><?php echo htmlspecialchars($technician['firstName']); ?></td>
            <td><?php echo htmlspecialchars($technician['lastName']); ?></td>
            <td><?php echo htmlspecialchars($technician['email']); ?></td>
            <td><?php echo htmlspecialchars($technician['phone']); ?></td>
            <td><button>Delete</button></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<a href="./index.php">Add Technician</a>

<?php
include '../view/footer.php';
?>