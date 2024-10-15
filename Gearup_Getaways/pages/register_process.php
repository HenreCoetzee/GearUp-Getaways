<?php
include('../db.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "INSERT INTO User (FirstName, LastName, Email, Password, Address, Phone, isAdmin) VALUES ('$firstname', '$lastname', '$email', '$password', '$address', '$phone', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    header('Location: login.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
