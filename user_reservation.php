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
    <div class="tag"><a href="logout.php" style="text-decoration:none;" title="">Logged in as <b style="color:green"><?php echo $_SESSION['fullname']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></div>
  </div>
   <div id="car"></div>  
  <div id="links-bg">
<div class="toplinks"><a href="user_index.php">Home</a></div>
<div class="toplinks"><a href="user_vehicle.php">Vehicle details</a></div>
	<div class="toplinks"><a href="user_reserve.php">Reservations</a></div>
	<div class="toplinks"><a href="user_about.php">About Us</a></div>
	<div class="toplinks"><a href="user_contact.php">Contact US</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Rental Cars Available</div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>RESERVE A CAR</h2>
<?php  @$regno1 = $_GET['regno']; 
@$fullname = $_GET['fullname'];
@$email = $_GET['email'];
?>
		<?php
include("config/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$regno= $_POST['regno'];
$fullname=$_POST['fullname'];
$national_ID=$_POST['national_ID'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$date=date('Y-m-d');
 
/* Now we will write a query to insert product details into database */
$sqli="Insert into reservations (regno,fullname,national_ID,phone,email,date) values('$regno','$fullname','$national_ID','$phone','$email','$date');";
$result=mysqli_query($con,$sqli);
{ $message =  "<h3>Car [ <font color=#fff>".$regno."</font> ] is successfully reserved.</h3>"; }
 
/* closing the if else statements */
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="padding:10px; font-size:22px; color:#fff;">
<table width="100%">
  <tr><td>Registration No. :</br><input type="text" name="regno" value="<?php echo $regno1; ?>" class="selecttext" required="required">
  </td>
  <td>Fullname :</br><input type="text" name="fullname" value="<?php echo $fullname; ?>" class="selecttext" required="required">
  </td></tr>
  <tr><td>National ID :</br><input type="number" name="national_ID" class="selecttext" required="required"></td>
  <td>Telephone :</br><input type="number" name="phone" class="selecttext" required="required">
  </td>
  </td></tr>
  <tr><td>Email :</br><input type="email" name="email" value="<?php echo $email; ?>" class="selecttext" required="required">
  </td>
  <td><a href ="terms.php"><h2>Terms of hire<h2></a></td>
  </td></tr>
  <tr>
  <td><input type="submit" name="submit" class="button100" value="BOOK CAR"></td>
  <td><?php	echo @$message; ?>
  </td>
  </tr>
  </table>
  </form>


  </div>
  <div class="left_content">
   <div id="quick_heading">Quick Reminder</div>
        <h3>Why choose our services?</h3>
		<ul>
		<li>0% booking fee</li>
		<li>Cheapest car rental prices</li>
		<li>Takes very little time to book</li>
		<li>No hidden charges</li>
		<li>Friendly and readily available customer care</li>
		</ul>
		<img src="images/homemain.jpg">
		<br><br>
		<div>Looking for a new car to purchase and not completely sure what kind? Experience the luxury of your Toyota car rental without any of the risks,
		so you can be sure you select the vehicle that's best for you.</div>
  </div>
 </div>
 </div>
</body>
</html>
