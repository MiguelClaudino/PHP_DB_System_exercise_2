<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Football recording &amp; analytics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../CSS/create_team.css">
</head>
<body>

<!-- ------------------------- USER CHIP ------------------------- -->
    
<div class="chip">
  <img src="../images/user.svg">
  <?php echo $_SESSION['name']; ?>
</div>

<!-- ------------------------ IMAGE VERIFY ------------------------ -->
    
<?php

if(!empty(filter_input(INPUT_POST, 'submit'))) {
    
    $tn = filter_input(INPUT_POST, 'team_name') 
		or die('Missing/illegal team name parameter');
	$tsn = filter_input(INPUT_POST, 'team_short_name') 
		or die('Missing/illegal team short name parameter');
    
    // upload logo
    $target_dir = "uploads/";
    $team_logo = $_FILES["team_logo"]["name"];
    $target_file = $target_dir . basename($_FILES["team_logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["team_logo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["team_logo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["team_logo"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["team_logo"]["name"]). " has been uploaded.";
            sql_execute ($tn, $tsn, $team_logo);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}

function sql_execute($tn, $tsn, $team_logo) {
    // database connection
    require_once('../dbcon.php');

    $sql = 'INSERT INTO team (team_name, team_short_name, team_logo, id_user) VALUES (?,?,?, ' . $_SESSION['id_user'] . ')';
    //echo "Sql: " . $sql . "<br>";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('sss', $tn, $tsn, $team_logo);
    $stmt->execute();

    if ($stmt->affected_rows >0) {
        echo 'team ' . $tn . ' is added :-)';
    }
    else {
        echo 'Error adding team ' . $tn . ' does this team already exist?';
    }
}

require('logout_and_menu.php');

?>
    
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="team_name" placeholder="team name" required>
    <br>
    <input type="text" name="team_short_name" placeholder="short name" required>
    <br>
    <input type="file" id="team_logo" name="team_logo" placeholder="team logo" required>
    <br>
    <input type="submit" name="submit" value="create">
</form>

</body>
</html>