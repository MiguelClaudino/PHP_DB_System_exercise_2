<link rel="stylesheet" type="text/css" href="CSS/login-and-menu.css">



<!-- ------------------------- SIDE MENU ------------------------- -->

<div id="main">
    <span onclick="openNav()">
        <div class="containerBar">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </span>
</div>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <?php require('menuLinks.php')?>
</div>



<!-- ------------------------- SIGN IN ------------------------- -->    

<div class="skillsDouble">
    <ul>
	<li><a onclick="drop()" class="dropbtn" href="#">Sign in</a></li>

        <?php
	/*
        if (@$_SESSION['id_user']) {
            echo '<li><a href="log_out.php">Sign Out</a></li>';
        }
        else {
            echo '<li><a onclick="drop()" class="dropbtn" href="#">Sign in</a></li>';
        }
        */
        ?>
        <div class="dropdown">
            <div id="myDropdown" class="dropdown-content">
                <form class="logForm" action="login.php" method="post">
                    
                    <input class="inputUn" type="text" name="username" placeholder="Email" onfocus="this.placeholder = ''"
onblur="this.placeholder = 'Email'" required>
                    <br>
                    
                    <input class="inputPw" type="password" name="pwhash" placeholder="Password" onfocus="this.placeholder = ''"
onblur="this.placeholder = 'Password'" required>
                    <br>
                    
                    <!-- Trigger/Open The Modal -->
                    <button id="myBtn" class="register" type="button" style="outline:none;"> Register </button>
                    
                    <input class="submit" type="submit" name="submit" value="Confirm">
                </form>
                <a class="close" onclick="drop()">X &nbsp;close</a>
            </div>
        </div>
    </ul>
</div>


    
<!-- ------------------------- REGISTER MODAL BOX ------------------------- -->

<?php require('modal.php')?>



<!-- -------------------- SIDE MENU SCRIPT -------------------- -->

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "222px";
    document.getElementById("main").style.marginLeft = "222px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.2)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}
</script>



<!-- ----------------- SIGN IN DROPDOWN SCRIPT ----------------- -->

<script>
/* When the user clicks on the button, toggle between hiding and showing the dropdown content */
function drop() {
    document.getElementById("myDropdown").classList.toggle("show");
}
</script>