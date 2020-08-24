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
    <div class="name">Slicc Rental Cars</div>
    <div class="tag">Built for the road ahead.</div>
  </div>
  <div id="car"></div>
  <div id="links-bg">
<div class="toplinks"><a href="index.php">Home</a></div>
	<div class="toplinks"><a href="reservations.php">Reservations</a></div>
	<div class="toplinks"><a href="login.php">Log In</a></div>
	<div class="toplinks"><a href="about.php">About Us</a></div>
	<div class="toplinks"><a href="contact.php">Contact US</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Rental Cars Available</div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>RESERVE A CAR</h2>
<?php  @$regno1 = $_GET['regno']; 
@$fullname = $_GET['fullname'];?>
		<?php
include("config/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$regno=$_POST['regno'];
$fullname=$_POST['fullname'];
$national_ID=$_POST['national_ID'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$date=date('Y-m-d');
 
/* Now we will write a query to insert product details into database */
$sql="Insert into reservations (regno,fullname,national_ID,phone,email,date) values('$regno','$fullname','$national_ID','$phone','$email','$date');";
$result=mysqli_query($con, $sql);
{ $message =  "<h3>Car [ <font color=#fff>".$regno."</font> ] is successfully reserved.</h3>"; }
 
/* closing the if else statements */
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding:10px; font-size:22px; color:#fff;">
<table width="100%">
  <tr><td>Registration No. :</br><input type="text" name="regno" value="<?php echo $regno1; ?>" class="selecttext" required="required">
  </td>
  <td>Fullname :</br><input type="text" name="fullname" class="selecttext" required="required">
  </td></tr>
  <tr><td>National ID :</br><input type="number" name="national_ID" class="selecttext" required="required"></td>
  <td>Telephone :</br><input type="number" name="phone" class="selecttext" required="required">
  </td>
  </td></tr>
  <tr><td>Email :</br><input type="email" name="email" class="selecttext" required="required">
  </td>
  <td>
  </td>
  </td></tr>
  <tr><td>
  <input type="submit" name="submit" class="button100" value="BOOK CAR">
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
  <option>1883</option>
  <option>2005</option>
  <option>2015</option>
  </select></br></br>
  <input type="submit" name="submit" class="button100" value="Check Availability">
  </form>
  </div>
 </div>
</body>
</html>
