<?php include('../includes/header.php'); ?>
<?php include('../db.php'); ?>

<h2 class="mt-4">Products</h2>
<div class="row">
<?php
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
$sql = $category_id ? "SELECT * FROM Product WHERE CategoryID = $category_id" : "SELECT * FROM Product";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4'>";
        echo "<div class='card mb-4 shadow-sm'>";
        echo "<img src='/gearup_getaways/images/" . $row["ProductID"] . ".jpg' class='card-img-top' alt='" . $row["Name"] . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["Name"] . "</h5>";
        echo "<p class='card-text'>" . $row["Description"] . "</p>";
        echo "<p class='card-text'>Price per day: $" . $row["PricePerDay"] . "</p>";
        echo "<a href='product_detail.php?id=" . $row["ProductID"] . "' class='btn btn-primary'>View Details</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}
$conn->close();
?>
</div>
<?php include('../includes/footer.php'); ?> 



