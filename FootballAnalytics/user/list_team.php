<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Football recording &amp; analytics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../CSS/list_team.css">
</head>
<body>

<!-- ------------------------- USER CHIP ------------------------- -->
    
<div class="chip">
  <img src="../images/user.svg">
  <?php echo $_SESSION['name']; ?>
</div>
    
<h3 class="title">Your teams</h3>

<!-- ----------------------- CONTENT ----------------------- -->

<?php
if(!empty(filter_input(INPUT_GET, 'id_user'))) {
	require_once('../dbcon.php');
	$id_user = filter_input(INPUT_GET, 'id_user') 
		or die('Missing/illegal id user parameter 1');
	$sql = 'SELECT id_user, id_team, team_name, team_short_name, team_logo FROM team WHERE id_user=?';
//	echo "SQL: " . $sql . "<br>";
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $id_user);
	$stmt->execute();
	$stmt->bind_result($id_user, $id_team, $team_name, $team_short_name, $team_logo);
    ?>
    <div class="table_wraper">
    <table>
    	<tr>
            <th></th>
        	<th>ID User</th>
        	<th>ID Team</th>
        	<th>Team Name</th>
        	<th>Team Short Name</th>
        	<th>Team Logo</th>
            <th></th>
         </tr
    <?php
	while ($stmt->fetch()) {
	?>
        <tr>
            <td>
                <a href="update_team.php?id_team=<?=$id_team?>">Edit</a>
            </td>
            <td><?= $id_user ?></td>
            <td><?= $id_team ?></td>
            <td><?= $team_name ?></td>
            <td><?= $team_short_name ?></td>
            <td><img src="uploads/<?= $team_logo ?>" width="100" height="100"></td>
            <td>
                <a href="delete_team.php?id_team=<?=$id_team?>">Delete</a>
            </td>
        </tr>
     <?php
	} // fill result variables
	echo "</table></div>";
}
else {
	echo 'illegal user/team combination';
}

require('logout_and_menu.php');

?>


</body>
</html>