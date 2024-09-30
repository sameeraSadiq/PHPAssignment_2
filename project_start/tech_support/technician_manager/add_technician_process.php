<?php
// Include the database connection
require('../model/database.php');

// Get form data
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Insert technician into the database
if ($firstName && $lastName && $email && $phone && $password) {
    try {
        // Prepare the SQL query
        $query = 'INSERT INTO technicians (firstName, lastName, email, phone, password)
                  VALUES (:firstName, :lastName, :email, :phone, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', password_hash($password, PASSWORD_DEFAULT)); // Hash the password
        $statement->execute();
        $statement->closeCursor();

        // Redirect to technician list
        header('Location: technician_list.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Please fill in all fields.";
}
?>