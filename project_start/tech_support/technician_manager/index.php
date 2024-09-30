<?php
require('../model/database.php');
include '../view/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsPro Technical Support</title>
    <style>
        form {
            max-width: 500px;
            overflow: hidden;
        }
        label, input {
            display: inline-block;
            width: 48%;
            margin: 5px 0;
            box-sizing: border-box;
            padding: 5px;
        }

        input[type='submit'] {
            width: 20%;
            float: right;
            margin-right: 15px;
        }

        input[type='submit']::before {
            display: table;
            clear: both;
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
    <h1>Add Technician</h1>
    <form action="add_technician_process.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Add Technician">
    </form>

    <a href="./technical_list.php">View Technician List</a>

   

</body>
</html>

<?php include '../view/footer.php'; ?>