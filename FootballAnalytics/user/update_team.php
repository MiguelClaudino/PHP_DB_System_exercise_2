<?php session_start(); 


function sql_execute ($team_name, $team_short_name, $team_logo, $id_team) {
    global $link;
    // database connection
    require_once('../dbcon.php');

    $sql = 'UPDATE team SET 
            team_name = "' . $team_name . '", 
            team_short_name = "' . $team_short_name . '"
            team_logo = "' . $team_logo . '" 
            WHERE id_team = ' . $id_team;
    echo "Sql: " . $sql . "<br>";
    $stmt = $link->prepare($sql);
    //$stmt->bind_param('ssss', $team_name, $team_short_name, $team_logo, $id_team);
    $stmt->execute();

    if ($stmt->affected_rows >0) {
		echo '<span style="margin: 50vw;">The team was updated :-)</span>';
	}
	else {
		echo 'Error updating team ' . $id_team;
	}
}

function sql_execute_02 ($team_name, $team_short_name, $id_team) {
    global $link;
    // database connection
    require_once('../dbcon.php');

    $sql = 'UPDATE team SET 
            team_name = "' . $team_name . '", 
            team_short_name = "' . $team_short_name . '"
            WHERE id_team = ' . $id_team;
    echo "Sql: " . $sql . "<br>";
    $stmt = $link->prepare($sql);
    //$stmt->bind_param('ssss', $team_name, $team_short_name, $id_team);
    $stmt->execute();

    if ($stmt->affected_rows >0) {
		echo '<span style="margin: 50vw;">The team was updated :-)</span>';
	}
	else {
		echo 'Error updating team ' . $id_team;
	}
}

?>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Football recording &amp; analytics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>    
    
<?php

require_once('../dbcon.php');

if(!empty(filter_input(INPUT_POST, 'submit'))) {
	//require_once('../dbcon.php');
	
	$id_team = filter_input(INPUT_POST, 'id_team') 
		or die('Missing/illegal team id');
    $team_name = filter_input(INPUT_POST, 'team_name') 
		or die('Missing/illegal team name');
    $team_short_name = filter_input(INPUT_POST, 'team_short_name') 
		or die('Missing/illegal team short name');
    
    // upload logo
    $target_dir = "uploads/";
    $team_logo = $_FILES["team_logo"]["name"];
    $target_file = $target_dir . basename($_FILES["team_logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"]) && !empty($_POST["team_logo"])) {
        $check = getimagesize($_FILES["team_logo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image";
            $uploadOk = 0;
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
                sql_execute ($team_name, $team_short_name, $team_logo, $id_team);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    else if (isset($_POST["submit"]) && empty($_POST["team_logo"])) {
        sql_execute_02 ($team_name, $team_short_name, $id_team);
    }

//
//	$sql = 'UPDATE team SET
//            team_name       = ?, 
//            team_short_name = ? 
//            WHERE id_team   = ?';
////	echo "Sql: " . $sql . "<br>";
//	$stmt = $link->prepare($sql);
//	$stmt->bind_param('ssi', $team_name, $team_short_name, $id_team);
//	$stmt->execute();
//	
//	if ($stmt->affected_rows >0) {
//		echo '<span style="margin: 50vw;">The team was updated :-)</span>';
//	}
//	else {
//		echo 'Error updating team ' . $id_team;
//	}
}
else
{
	$id_team = filter_input(INPUT_GET, 'id_team') 
		or die('Missing/illegal team name parameter');
	$sql = 'SELECT id_team, id_user, team_name, team_short_name, team_logo FROM team WHERE id_team=?';
//	echo "SQL: " . $sql . "<br>";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $id_team);
	$stmt->execute();
	$stmt->bind_result($id_team, $id_user, $team_name, $team_short_name, $team_logo);
	while ($stmt->fetch()) {}
?>

<form style="margin-top: 100px;" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_team" value="<?=$id_team;?>" >
    <input type="text" name="team_name" value="<?=$team_name;?>" placeholder="team name" required>
    <input type="text" name="team_short_name" value="<?=$team_short_name;?>" placeholder="short name" required>
    <input type="file" name="team_logo" placeholder="team logo">
    <input type="submit" name="submit" value="Update">
</form>

<?php 
}
    
require('logout_and_menu.php');

?>


</body>
</html>