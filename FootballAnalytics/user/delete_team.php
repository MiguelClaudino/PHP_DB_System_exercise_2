<?php session_start(); ?>
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
		or die('Missing/illegal team name parameter 1');
	$sql = 'DELETE FROM team WHERE id_team=?';
	//echo "Sql: " . $sql . "<br>";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $id_team);
	$stmt->execute();
	
	if ($stmt->affected_rows >0) {
		echo '<span style="margin: 50vw;">The team was deleted :-)</span>';
	}
	else {
		echo 'Error deleting team ' . $id_team . ' does this team already exist?';
	}
}
else
{
	$id_team = filter_input(INPUT_GET, 'id_team') 
		or die('Missing/illegal team name parameter 1');
	echo "ID_TEAM: " . $id_team . "<br>";
	$sql = 'SELECT id_team, id_user, team_name, team_short_name, team_logo FROM team WHERE id_team=?';
//	echo "SQL: " . $sql . "<br>";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $id_team);
	$stmt->execute();
	$stmt->bind_result($id_team, $id_user, $team_name, $team_short_name, $team_logo);
	while ($stmt->fetch()) {}



?>
    

<form style="margin-top: 100px;" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden" name="id_team" value="<?=$id_team;?>" >
    <input type="text" name="team_name" value="<?=$team_name;?>" placeholder="team name" required>
    <input type="text" name="team_short_name" value="<?=$team_short_name;?>" placeholder="short name" required>
    <input type="file" name="team_logo" placeholder="team logo">
    <input type="submit" name="submit" value="Delete">
</form>

<?php }
    require('logout_and_menu.php');
?>


</body>
</html>