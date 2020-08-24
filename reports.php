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
    <div class="name">ADMINISTRATOR PANEL </br> Slicc Rental Cars</div>
    <div class="tag"><a href="logout.php" style="text-decoration:none;" title="">Logged in as <b style="color:green"><?php echo $_SESSION['fullname']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></div>
  </div>
  <div id="car"></div>
  <div id="links-bg">
	<div class="toplinks"><a href="administrator.php">Home</a></div>
	<div class="toplinks"><a href="manage_vehicles.php">Vehicles</a></div>
	<div class="toplinks"><a href="manage_reservations.php">Reservations</a></div>
	<div class="toplinks"><a href="manage_users.php">Users</a></div>
	<div class="toplinks"><a href="reports.php">Reports</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Rental Cars Available</div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>GENERATE REPORTS</h2>
CARS REPORT
<form method="post" target="_blank" action="tcpdf/examples/report1.php" style="padding:10px; font-size:22px; color:#fff;">
<fieldset>
	<b style="color:#000000;"> Availability Status:</b> <select name="status" class="selecttext">
	<option></option>
	<option>Available</option>
	<option>Not Available</option>
	</select></br></br>
    <input type="submit" name="submit" class="button100" value="Generate">
	</fieldset>
  </form>
  </br></br>
  RESERVATIONS REPORT
<form method="post" target="_blank" action="tcpdf/examples/report2.php" style="padding:10px; font-size:22px; color:#fff;">
<fieldset>
<b style="color:#000000;">From Date : </b><input type="text" name="fromDate" class="selecttext" placeholder="YYYY-MM-DD">
    <b style="color:#000000;">To Date : </b><input type="text" name="toDate" class="selecttext" placeholder="YYYY-MM-DD"></br></br>
    <input type="submit" name="submit" class="button100" value="Generate">
	</fieldset>
  </form>

  </div>
  <div class="left_content">
  <h2 style="height:30px; width:292px; background:#000000; margin-top:-1px; padding: 6px;">Check Availability of Car</h2>
  <form method="post" action="index.php" style="padding:10px; font-size:22px; color:#fff;">
  Transmission Type :</br><select name="type" class="selecttext" required="required">
  <option>Automatic</option>
  <option>Manual</option>
  </select>
  </br></br>
  Body Type :</br><select name="model" class="selecttext" required="required">
  <option>SUV</option>
  <option>Bus</option>
  <option>Sedan</option>
  <option>Truck</option>
  <option>Hatch</option>
  </select>
  </br></br>
  Year of manufacturer :</br><select name="year" class="selecttext" required="required">
  <option>2005</option>
  <option>2010</option>
  <option>2015</option>
  </select></br></br>
  <input type="submit" name="submit" class="button100" value="Check Availability">
  </form>
  </div>
 </div>
 </div>
</body>
</html>
