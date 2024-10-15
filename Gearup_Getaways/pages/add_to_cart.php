<?php
session_start();
include('../db.php');

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

$sql = "SELECT * FROM Product WHERE ProductID = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($product) {
    $cart_item = [
        'id' => $product['ProductID'],
        'name' => $product['Name'],
        'price_per_day' => $product['PricePerDay'],
        'quantity' => $quantity
    ];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $cart_item;
    }

    header('Location: cart.php');
} else {
    echo "Product not found.";
}

$conn->close();
?>
