<?php include('../includes/header.php'); ?>

<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart = $_SESSION['cart'];
$total_price = 0;
foreach ($cart as $item) {
    $total_price += $item['price_per_day'] * $item['quantity'];
}
?>

<div class="container mt-5">
    <h2>Your Cart</h2>
    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price per Day</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>$<?php echo htmlspecialchars(number_format($item['price_per_day'], 2)); ?></td>
                        <td>$<?php echo htmlspecialchars(number_format($item['price_per_day'] * $item['quantity'], 2)); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="font-weight-bold">Total Price: $<?php echo number_format($total_price, 2); ?></p>

        <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
        <a href="products.php" class="btn btn-secondary ml-2">More Products</a>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
