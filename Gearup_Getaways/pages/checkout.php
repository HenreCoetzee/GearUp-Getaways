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

$address = "";
$order_placed = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = htmlspecialchars($_POST['address']);
    // Here you would normally process the order, save it to the database, etc.
    $order_placed = true;
    // Clear the cart after placing the order
    $_SESSION['cart'] = [];
}
?>

<div class="container mt-5">
    <h2>Checkout</h2>
    <?php if ($order_placed): ?>
        <div class="alert alert-success">
            Your order is on the way!
        </div>
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
        
        <form method="post" action="">
            <div class="form-group">
                <label for="address">Shipping Address:</label>
                <input type="text" class="form-control form-control-sm" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="card_name">Name on Card:</label>
                <input type="text" class="form-control form-control-sm" id="card_name" name="card_name" placeholder="John Doe" value="xxx" required>
            </div>
            <div class="form-group">
                <label for="card_number">Card Number:</label>
                <input type="text" class="form-control form-control-sm" id="card_number" name="card_number" placeholder="xxxx-xxxx-xxxx-xxxx" value="xxx" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="expiry_date">Expiry Date:</label>
                    <input type="text" class="form-control form-control-sm" id="expiry_date" name="expiry_date" placeholder="MM/YY" value="xxx" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control form-control-sm" id="cvv" name="cvv" placeholder="xxx" value="xxx" required>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
