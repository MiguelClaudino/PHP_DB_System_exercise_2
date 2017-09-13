<link rel="stylesheet" type="text/css" href="CSS/modal.css">

<?php
if(!empty(filter_input(INPUT_POST, 'submit2'))) {
	
	require_once('dbcon.php');
    
    $name = filter_input(INPUT_POST, 'name')
        or die('Missing/illegal name parameter');
	$un = filter_input(INPUT_POST, 'username') 
		or die('Missing/illegal username parameter');
	$pw = filter_input(INPUT_POST, 'pwhash') 
		or die('Missing/illegal password parameter');
	// hash and salt the password
	$pw = password_hash($pw, PASSWORD_DEFAULT); 
	
//	echo 'Creating user: '.$un.' => '.$pw;
	
	$sql = 'INSERT INTO user (name, username, pwhash, registration_date) VALUES (?,?,?,now())';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('sss',$name, $un, $pw);
	$stmt->execute();
	
	if ($stmt->affected_rows >0){
		echo 'user ' . $un . ' is added :-)';
	}
	else {
		echo 'Error adding user ' . $un . ' does this user already exist?';
	}
}
?>



<!-- ------------------------- REGISTER MODAL BOX ------------------------- -->

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close2">&times;</span>
      <h2>Fill your registration info please</h2>
    </div>
      
      <div class="modal-body">
          <form action="<?= $_SERVER['PHP_SELF'] ?>" class="registerForm" method="post">
              
              <input class="inputUn" type="text" placeholder="First and last name" name="name" onfocus="this.placeholder = ''"
onblur="this.placeholder = 'First and last name'" required>
              <br>
              <br>
              
              <input class="inputUn" type="email" placeholder="Email" name="username" onfocus="this.placeholder = ''"
onblur="this.placeholder = 'Email'" required>
              <br>

              <input class="inputPw" type="password" placeholder="Password" name="pwhash" onfocus="this.placeholder = ''"
onblur="this.placeholder = 'Password'" required>
              <br>

<!--
              <input class="inputPw" type="password" placeholder="Repeat Password" name="psw-repeat" onfocus="this.placeholder = ''"
onblur="this.placeholder = 'Repeat Password'" required>
-->
              <br>

              <input name="submit2" type="submit" class="submit2" value="Creat user">
          </form>
      </div>
  </div>
</div>



<!-- ----------------- REGISTER MODAL SCRIPT ----------------- -->

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>