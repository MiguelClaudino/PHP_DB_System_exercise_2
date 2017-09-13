<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Football recording &amp; analytics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../CSS/user.css">
</head>
<body>



<!-- ------------------------- USER CHIP ------------------------- -->
    
<div class="chip">
  <img src="../images/user.svg">
  <?php echo $_SESSION['name']; ?>
</div>



<!-- ------------------------- MENU ------------------------- -->

<?php require('logout_and_menu.php'); ?>



<!-- ------------------------ CONTENT ------------------------ -->
    
<div class="text">
    <p>
        Please use the menu to create and view teams
        <br>
        This page is still being built
    <p>
</div>

</body>
</html>