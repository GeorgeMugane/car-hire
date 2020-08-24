<?php
include_once('config/config.php');
// Inialize session
session_start();

// Check, if email session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
header('Location: index.php');
}
?>
<html>
<head>
<title>Slicc Car Rental Services</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="border">
 <div id="left10">
    <div class="name">USER PANEL </br> Slicc Rental Cars</div>
    <div class="tag"><a href="logout.php" style="text-decoration:none;" title="">Logged in as <b style="color:green"><?php echo $_SESSION['fullname']; ?>
	</b>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></div>
	</div>
  <div id="car"></div>
 <div id="links-bg">
	<div class="toplinks"><a href="index.php">Home</a></div>
	<div class="toplinks"><a href="user_vehicle.php">Vehicle details</a></div>
	<div class="toplinks"><a href="user_reserve.php">Reservations</a></div>
	<div class="toplinks"><a href="user_about.php">About Us</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Talk To Us Now!</div>
    <div class="headingbg2"></div>
    <div style="background-image:url(images/bg2); background-repeat:repeat-y; float:left;">
      <div id="left">
        <div class="main_content">        
		<div class="img">
	<h4>Our helpdesk is always at your service</h4>
	<img src="images/helpdesk.jpg">
	<div class="desc">Need help planning your trip? our staff are always ready to help with useful tips,advice and recommendations.</div>
		</div>
        </div>
      </div>
      <div class="left_content">
        <div id="quick_heading">Quick Links</div>
        <div class="quicklinks" style="background-image:url("contact_us.jpg");"> 
		<a href="https://www.twitter/Denniskibe/"><img src="images/twitter.png">Follow us on Twitter</a><br>
		<a href="https://www.twitter/Denniskibe/"><img src="images/instagram.jpg">Follow us on Instagram</a><br>
		<a href="https://instagram.com/dennismashal/"><img src="images/facebook.png">Like us on facebook</a><br><br>
				<img src="images/contact.jpg">
				<h4>Contact us directly via Cell: +254780155506</h4><br>
		</div>
       </div>
    </div>
  </div>
 </div>
</body>
</html>
