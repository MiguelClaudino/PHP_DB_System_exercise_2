<link rel="stylesheet" type="text/css" href="../CSS/menuLinks.css">

<?php

$fn = basename($_SERVER['PHP_SELF']);

?>

<nav>
    <a class="menu<?= ($fn == 'user.php') ? '_active' : '' ?>" href="user.php">User profile</a>
    
    <a class="menu<?= ($fn == 'list_team.php') ? '_active' : '' ?>" href="list_team.php?id_user=<?= $_SESSION['id_user']; ?>">View teams</a>
    
    <a class="menu<?= ($fn == 'create_team.php') ? '_active' : '' ?>" href="create_team.php">Create team</a>
    
    <a class="menu<?= ($fn == 'account_details.php') ? '_active' : '' ?>" href="account_details.php">Account details</a>
</nav>