<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Coding Style</title>
</head>

<body>

<?php
	
	if (!empty($_SESSION['uid'])){
		echo 'Logged in as user '.$_SESSION['un'];
		echo '<br> Secret info here...';
	}
	else {
		echo 'Not logged in...';
	}
	
?>

<?php require('login-and-menu.php')?>

</body>
</html>