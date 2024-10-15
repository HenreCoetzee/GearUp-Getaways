<?php
include('../includes/header.php');
include('../db.php');

$product_id = $_GET['id'];
$sql = "SELECT * FROM Product WHERE ProductID = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>
<h2><?php echo $product["Name"]; ?></h2>
<p><?php echo $product["Description"]; ?></p>
<p>Price per day: R<?php echo $product["PricePerDay"]; ?></p>
<form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product["ProductID"]; ?>">
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $product["QuantityAvailable"]; ?>" required>
    <button type="submit">Add to Cart</button>
</form>
<?php include('../includes/footer.php'); ?>
