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
	<div class="toplinks"><a href="user_index.php">Home</a></div>
	<div class="toplinks"><a href="user_vehicle.php">Vehicle details</a></div>
	<div class="toplinks"><a href="user_reserve.php">Reservations</a></div>
	<div class="toplinks"><a href="user_contact.php">Contact US</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">About The Company</div>
    <div class="headingbg2"></div>
    <div style="background-image:url(images/bg2); background-repeat:repeat-y; float:left;">
      <div id="left">
        <div class="main_content">
		<h3>ABOUT US</h3>
		<P> Slicc Rental Cars Company began in June 2002. It is situated in the Central Business District of Nairobi City,
		 on the 4th Floor of Loita House we specialise on Renting Toyota brand Cars. It first began with a fleet of six cars, all meant for hiring services
		 to qualified persons. Mr. Dennis Kibe is the proprietor and manager of the company with six other employees working under him.
		 The company has an objective to meet the city's transport needs as a private enterprise.We also aim to exceed our customers
		 expectations by offering competitive car rental service rates with no hidden charges,safety checked rental cars and friendly
         hospitality</P><img src="images/parkinglot.jpg">
        </div>
      </div>
      <div class="left_content">
        <div id="quick_heading">Rent Locally. Rent Quality</div>
		<h3>Rent From us and you'll never go back.</h3>
		<img src="images/homemain.jpg">
	    <div class="quicklinks" style="height:auto;">Whether you're headed out of town for a vacation, need a vehicle for business in a new city, or have your current 
		car in the shop, you'll never regret a slicc car rental. Our vehicles have all the power, sleek curves, and comfort you've come to
		expect from our brand, not to mention the latest and greatest technology to make the drive that much more pleasant and convenient. It doesn't
		matter if you want to rent a Toyota car, a spacious SUV, a rugged truck, or a gas-saving hatch<br>All that is available and more</div>
		 <h3>Manager : Mr. Dennis Kibe<h3>
		 <img src="images/mg.jpg">
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
