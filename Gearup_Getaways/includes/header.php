<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearUp Getaways</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="/gearup_getaways/css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark-blue">
            <a class="navbar-brand" href="/gearup_getaways/index.php">GearUp Getaways</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/gearup_getaways/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/gearup_getaways/pages/categories.php">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/gearup_getaways/pages/products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="/gearup_getaways/pages/cart.php">Cart</a></li>
                    <?php if (isset($_SESSION['userid'])): ?>
                        <li class="nav-item"><a class="nav-link" href="/gearup_getaways/pages/logout.php">Logout (<?php echo $_SESSION['firstname']; ?>)</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/gearup_getaways/pages/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/gearup_getaways/pages/register.php">Register</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="/gearup_getaways/pages/contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container">










