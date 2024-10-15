<?php
session_start();
include('../db.php');

$user_id = $_SESSION['userid'];
$shipping_address = $_POST['shipping_address'];
$total_price = 0;

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (empty($cart)) {
    echo "Your cart is empty.";
    exit();
}

// Calculate total price
foreach ($cart as $item) {
    $total_price += $item['price_per_day'] * $item['quantity'];
}

// Insert order into database
$sql = "INSERT INTO Orders (UserID, orderDate, Status, TotalPrice, ShippingAddress, ShippingStatus) VALUES ($user_id, NOW(), 'Pending', $total_price, '$shipping_address', 'Pending')";
if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;

    // Insert order details
    foreach ($cart as $item) {
        $product_id = $item['id'];
        $quantity = $item['quantity'];
        $price_per_day = $item['price_per_day'];

        $sql = "INSERT INTO OrderDetails (OrderID, ProductID, Quantity, PricePerDay) VALUES ($order_id, $product_id, $quantity, $price_per_day)";
        $conn->query($sql);
    }

    // Clear the cart
    unset($_SESSION['cart']);

    echo "Order placed successfully!";
    header('Location: ../index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
