<?php include('../includes/header.php'); ?>
<?php include('../db.php'); ?>

<div class="container category-content">
    <h2>Categories</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM Category";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagePath = '';
                switch (strtolower($row["Name"])) {
                    case 'camping':
                        $imagePath = '/gearup_getaways/images/category_camping.png';
                        break;
                    case 'hiking':
                        $imagePath = '/gearup_getaways/images/category_hiking.png';
                        break;
                    case 'kayaking':
                        $imagePath = '/gearup_getaways/images/category_kayaking.png';
                        break;
                }
                echo "<div class='col-md-4'>";
                echo "<a href='products.php?category_id=" . $row["CategoryID"] . "'>";
                echo "<div class='category-block'>";
                if ($imagePath) {
                    echo "<img src='" . $imagePath . "' alt='" . $row["Name"] . " Gear'>";
                }
                echo "<h3>" . $row["Name"] . "</h3>";
                echo "<p>" . $row["Description"] . "</p>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "No categories found.";
        }
        $conn->close();
        ?>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
