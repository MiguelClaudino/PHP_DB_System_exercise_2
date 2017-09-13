<link rel="stylesheet" type="text/css" href="../CSS/login-and-menu-user.css">

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
    <?php require('menuLinksUser.php')?>
</div>



<!-- ------------------------- SIGN IN ------------------------- -->    

<div class="skillsDouble">
    <ul>
        <?php 
        if (@$_SESSION['id_user']) {
            echo '<li><a href="../log_out.php">Sign Out</a></li>';
	}
        else if (@$_SESSION['id_coach']) {
            echo '<li><a href="../log_out.php">Sign Out</a></li>';
        }
        else if (@$_SESSION['id_player']) {
            echo '<li><a href="../log_out.php">Sign Out</a></li>';
	}
	else {
		echo "No logout file!";
	}
        ?>
    </ul>
</div>

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