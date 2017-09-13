<link rel="stylesheet" type="text/css" href="CSS/menuLinks.css">

<?php

$fn = basename($_SERVER['PHP_SELF']);

?>

<nav>
    <a class="menu<?= ($fn == 'index.php') ? '_active' : '' ?>" href="index.php">Home</a>
    
    <a class="menu<?= ($fn == 'products.php') ? '_active' : '' ?>" href="products.php">Products</a>
    
    <a class="menu<?= ($fn == 'about.php') ? '_active' : '' ?>" href="about.php">About</a>
    
    <a class="menu<?= ($fn == 'support.php') ? '_active' : '' ?>" href="support.php">Support</a>
    
    <a class="menu<?= ($fn == 'secret.php') ? '_active' : '' ?>" href="secret.php">Secret</a>
</nav>