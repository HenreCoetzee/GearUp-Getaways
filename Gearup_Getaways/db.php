<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // Adjust the port if necessary
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "gearup_getaways"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
