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
  <div class="toplinks"><a href="reports.php">Reports</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Rental Cars Available</div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>ADD CARS</h2>
		<?php
include("config/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$type=$_POST['type'];
$model=$_POST['model'];
$year=$_POST['year'];
$regno=$_POST['regno'];
$title=$_POST['title'];
$description=$_POST['description'];
$date=date('Y-m-d');
 
/* Now we will check if product is already in use or not */
$queryuser=mysqli_query($con, "SELECT * FROM cars WHERE regno='".$regno."' ");
$checkuser=mysqli_num_rows($queryuser);
if($checkuser != 0)
{ $message =  "<h3>Sorry, a car with the number [ <font color=red>".$regno." </font> ] already exists*.</h3>"; }
else {


/* upload profile image start */
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    $message =  'Return Code: " . $_FILES["file"]["error"] . "</br>';
  } else {
    /*$message2 = 'Uploaded profile picture: " . $_FILES["file"]["name"] . "</br>';*/
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
   /* $message3 = ' $_FILES["file"]["name"] . " already exists. "';*/
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
	 
	  $file = $_FILES["file"]["name"];
    }
  }
} else {
  /*$message4 "Invalid file";*/
}
	/* upload profile image end */

$file = $_FILES["file"]["name"];

/* Now we will write a query to insert product details into database */
$sql="Insert into cars (type,model,year,regno,file,title,description,date) values('$type','$model','$year','$regno','$file','$title','$description','$date');";
$result=mysqli_query($con, $sql);
{ $message =  "<h3>Car [ <font color=#fff>".$regno."</font> ] is successfully added.</h3>"; }
 
/* closing the if else statements */
}
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" style="padding:10px; font-size:22px; color:#fff;">
<table width="100%">
  <tr><td>
  Transmission Type :</br><select name="type" class="selecttext" required="required">
  <option>Automatic</option>
  <option>Manual</option>
  </select>
  </td>
  <td>
  Body Type :</br><select name="model" class="selecttext" required="required">
  <option>SUV</option>
  <option>Bus</option>
  <option>Sedan</option>
  <option>Truck</option>
  <option>Hatch</option>
  </select>
  </td></tr>
  <tr><td>Year of manufacturer :</br><select name="year" class="selecttext" required="required">
  <option>2005</option>
  <option>2010</option>
  <option>2015</option>
  </select></td>
  <td>Car Number :</br><input type="text" name="regno" class="selecttext" required="required">
  </td>
  </td></tr>
  <tr><td>Post Title :</br><input type="text" name="title" class="selecttext" required="required">
  </td>
  <td>Post Description :</br><textarea name="description" class="textarea1" required="required"></textarea>
  </td>
  </td></tr>
   <tr><td>Car Photo :</br><input type="file" name="file" class="selecttext" required="required">
  </td>
  <td>  </td>
  </td></tr>
  <tr><td>
  <input type="submit" name="submit" class="button100" value="Add Vehicle">
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
