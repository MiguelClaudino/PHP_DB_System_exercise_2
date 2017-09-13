<?php 
session_start(); 

// Verify user type
if(!empty(filter_input(INPUT_POST, 'submit'))) 
{
	require_once('dbcon.php');
	$username = filter_input(INPUT_POST, 'username') 
		or die('Missing/illegal name parameter 1');
	$pw = filter_input(INPUT_POST, 'pwhash') 
		or die('Missing/illegal password parameter');
	
	// Verify user password
	$sql = 'SELECT id_user, pwhash, name FROM user WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $username);
	$stmt->execute();
	$stmt->bind_result($id_user, $pwhash, $name);
	while ($stmt->fetch()) {} // fill result variables
	if (password_verify($pw, $pwhash)) {
		$_SESSION['id_user'] = $id_user;
		$_SESSION['username'] = $username;
		$_SESSION['name'] = $name;
		header('Location: user/user.php');
}
	else {
		// Verify coach password
		$sql = 'SELECT id_coach, pwhash FROM coach WHERE username=?';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->bind_result($id_coach, $pwhash);
		while ($stmt->fetch()) {} // fill result variables
		if (password_verify($pw, $pwhash)) {
			$_SESSION['id_coach'] = $id_coach;
			$_SESSION['coach_name'] = $coach_name;
			header('Location: coach/coach.php');
			}
		else {
			// Verify player password
			$sql = 'SELECT id_player, pwhash FROM player WHERE username=?';
			$stmt = $link->prepare($sql);
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->bind_result($id_player, $pwhash);
			while ($stmt->fetch()) {} // fill result variables
			if (password_verify($pw, $pwhash)) {
				$_SESSION['id_player'] = $id_player;
				$_SESSION['player_name'] = $player_name;
				header('Location: player/player.php');
				}
				else {
					echo 'illegal username/password combination';
				}
		}
	}
}

?>