<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Football recording &amp; analytics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>

</head>

<body>
<div class="loader"></div>



<!-- ------------------------- BACKGROUND ------------------------- -->

<div class="background" style="display: table;">
    <div style="display: table-cell; vertical-align: middle;">
        <div class="animate">
            <h1>Beat the best.</h1>
            <h2>we film and/or analyse for you</h2>
        </div>
    </div>
</div>

<?php require('login-and-menu-index.php')?>



<!-- ------------------------ WHICH ARE YOU ------------------------ -->

<div class="containerChoose">
    <p>Which are you?</p>
    <ul class="list">
        <li class="li_items margin_right"><a href="#coach"><img src="images/strategy.svg" class="coach"><br>Coach</a></li>
        <li class="li_items margin_right"><a href="#athlete"><img src="images/football.svg"><br>Athlete</a></li>
        <li class="li_items"><a href="#fan"><img src="images/foam-finger.svg"><br>Fan</a></li>
    </ul>
</div>



<!-- ------------------------ COACH SECTION ------------------------ -->

<div id="coach" class="orange_back">
    <h3>Coach</h3>
    <h4>Train better, play better</h4>
    <p>We provide crucial training help for winning teams. This is the best coach assistent, before, during and after games</p>
    <br>
    <p>Every top coach knows the importance of good training and they won’t traid it for nothing else. Improve your chances of winning by letting us play with you!</p>
    <br>
    <p>Schedule trainnings and games, notify athletes about personalized gym and nutrition plans</p>
    <img class="coach_img" src="images/galaxy_tablet.jpg">
</div>

<div class="orange_back_two">
    <img class="coach_img_two" src="images/ScreenShotApp.png">
    <h4>Every data at one click away</h4>
    <p>Have the most essencial data, about players in your team, for winning games always with you</p>
    <br>
    <p>Facts don’t lie, just like our powerfull analytics. Trust us to go to the next level!</p>
</div>
    
<div class="what_you_can_do_coach">
    <h3>What you can do</h3>
    <p class="margin_bottom">As a coach you want to have control over your players, and this is what we will help you with :</p>
    <p>Schedule trainings, games and gym sessions</p>
    <p>Analyze past games and trainings, and send it to players</p>
    <p>See the other teams game videos</p>
    <p>Send personalized nutrition and gym plans</p>
    <p>Highlight important moments and share with the team</p>
    <p>Send personal notifications and messages</p>
    <p>and much more…</p>
    <br><br>
    <a href="#">see demo</a>
</div>



<!-- ----------------------- ATHLETE SECTION ----------------------- -->

<div id="athlete" class="orange_back_athlete">
    <h3>Athlete</h3>
    <h4>Custom made for you</h4>
    <p>As an athlete, you are the most important part of a team. You always play a crucial role, and with our help you will take the right decission every time</p>
    <br>
    <p>Follow your gym and nutrition plans set just for you by your coaches, and send them feadback on everything</p>
    <img class="athlete_img" src="images/lebron_tablet_bench.jpg">
</div>

<div class="orange_back_two_athlete">
    <img class="athlete_img_two" src="images/ScreenShotApp.png">
    <h4>Improve your game with data</h4>
    <p>Have the most essencial data about your games and trainings available at any moment</p>
    <br>
    <p>Facts don’t lie just like our powerfull analytics. Trust us to take you to the next level!</p>
</div>
    
<div class="what_you_can_do_athlete">
    <h3>What you can do</h3>
    <p class="margin_bottom">As an athlete you want to have control over your plays, and this is what we will help you with :</p>
    <p>Check your schedules for trainings and games</p>
    <p>Analyze past games and trainings, and ask choaching tips</p>
    <p>See the other teams game videos</p>
    <p>Follow a personalized nutrition and gym plan</p>
    <p>See highlighted moments and share</p>
    <p>Send personal notifications and messages</p>
    <p>and much more…</p>
    <br>
    <a href="#">see demo</a>
</div>



<!-- ------------------------ FAN SECTION ------------------------ -->

<div id="fan" class="orange_back_fan">
    <h3>Fan</h3>
    <h4>All for free</h4>
    <p>As a fan, you will have free access to every player profile, and parts of match videos.</p>
    <br>
    <p>Every statistic will also be avaialible for whatever you want to use them, just for fun or even for betting.</p>
    <img class="fan_img" src="images/fans_2.jpg">
</div>



<!-- ------------------------ FOOTER SECTION ------------------------ -->

<div class="orange_back_footer">
    <ul>
        <li class="margin_right_two">
            <h4>Contact</h4>
            <p>
                91 41 80 40
                <br>
                fas@general.com
                <br>
                <a href="">Ask for a demo</a>
            </p>
        </li>
        <li class="margin_right_two">
            <h4>About</h4>
            <p>
                <a href="">About us</a>
                <br>
                <a href="">Product history</a>
                <br>
                <a href="">Client list</a>
            </p>
        </li>
        <li class="margin_right_two">
            <h4>Blog</h4>
            <p>
                <a href="">Poduct news</a>
                <br>
                <a href="">Company news</a>
                <br>
                <a href="">Tutorials</a>
            </p>
        </li>
        <li>
            <h4>Social</h4>
            <p>
                <a href="">Facebook</a>
                <br>
                <a href="">Instagram</a>
                <br>
                <a href="">Twitter</a>
            </p>
        </li>
    </ul>
</div>




<!-- --------------------- SCROLL TO - SCRIPT --------------------- -->

<script>

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

</script>    

</body>
</html>