<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // You can save this information to the database or send an email
    // For now, we'll just display a thank you message

    echo "Thank you, $name. Your message has been received. We will get back to you shortly.";
}
?>
