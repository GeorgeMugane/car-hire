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
<h2>ADD USER &nbsp;&nbsp;&nbsp;<a href="users.php">View & Delete Users</a></h2>
		<?php
include("config/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$confirm=md5($_POST['confirm']);
$type = "Staff";

/* Now we will check if product is already in use or not */
$queryuser=mysqli_query($con, "SELECT * FROM login WHERE email='".$email."' ");
$checkuser=mysqli_num_rows($queryuser);
if($checkuser != 0)
{ $message =  "<h3>Sorry, a user with the email [ <font color=red>".$email." </font> ] already exists*.</h3>"; }
else if ($password != $confirm) {
$message =  "<h3>Sorry, Password and confirm password fields do not match*.</h3>";
}
else {
 
/* Now we will write a query to insert product details into database */
$sql="Insert into login (fullname,email,password,type) values('$fullname','$email','$password','$type');";
$result=mysqli_query($con, $sql);
{ $message =  "<h3>User [ <font color=#fff>".$fullname."</font> ] is successfully registered.</h3>"; }
 }
/* closing the if else statements */
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding:10px; font-size:22px; color:#fff;">
<table width="100%">
  <tr><td>Fullname :</br><input type="text" name="fullname" class="selecttext" required="required">
  </td>
  <td>Email :</br><input type="email" name="email" class="selecttext" required="required">
  </td></tr>
  <tr><td>Password :</br><input type="password" name="password" class="selecttext" required="required"></td>
  <td>Confirm Password :</br><input type="password" name="confirm" class="selecttext" required="required">
  </td>
  </td></tr>

  <tr><td>
  <input type="submit" name="submit" class="button100" value="ADD USER">
  </td>
  <td><?php	echo @$message; ?>
  </td>
  </tr>
  </table>
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
