<?php
include('../db.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM User WHERE Email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['Password'])) {
        session_start();
        $_SESSION['userid'] = $user['UserID'];
        $_SESSION['firstname'] = $user['FirstName'];
        header('Location: ../index.php');
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with that email address.";
}

$conn->close();
?>
