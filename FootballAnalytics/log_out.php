<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="refresh" content="2; url=index.php">

</head>
<body>

<?php
    
// remove all session variables
session_unset();

// destroy the session
session_destroy();

?>
<h1>You logged out succesfully</h1>

</body>
</html> 