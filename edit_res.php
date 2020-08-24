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
   <div class="name">USER PANEL - CAR RESERVATION </br> Slicc Rental Cars</div>
    <div class="tag"><a href="logout.php" style="text-decoration:none;" title="">Logged in as <b style="color:green"><?php echo $_SESSION['fullname']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></div>
  </div>
  <div id="car"></div>
  <div id="links-bg">
	<div class="toplinks"><a href="reservations.php">Reservations</a></div>
	<div class="toplinks"><a href="login.php">Log In</a></div>
	<div class="toplinks"><a href="about.php">About Us</a></div>
	<div class="toplinks"><a href="contact.php">Contact US</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Rental Cars Available</div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>EDIT YOUR RESERVATION</h2>
	<?php
	 include("config/config.php");
$id = $_GET['id'];
$cars = mysqli_query($con, "SELECT * FROM reservations WHERE id='$id'") or die(mysqli_error());  
			 WHILE($row = mysqli_fetch_array($cars)){
				?>
<form method="post" action="edit_res_data.php" style="padding:10px; font-size:22px; color:#fff;">
<input type="hidden" name="id" value="<?php  echo $row['id']; ?>" />
<table width="100%">
<tr><td>Registration No. :</br><input type="text" name="regno" value="<?php  echo $row['regno']; ?>" class="selecttext" required="required">  </td>
  <td></br><input type="text" name="date" value="<?php  echo $date = date('Y-m-d'); ?>" class="selecttext" required="required">
  </td>
  </td></tr>
  <tr><td>
  <input type="submit" name="submit" class="button100" value="EDIT">
  </td>
  <td>
  </td>
  </tr>
  </table>
  </form>
<?php } ?>

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
