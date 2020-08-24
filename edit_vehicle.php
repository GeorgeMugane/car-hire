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
<h2>EDIT VEHICLE</h2>
	<?php
	 include("config/config.php");
$id = $_GET['id'];
$cars = mysqli_query($con,"SELECT * FROM cars WHERE id='$id'") or die(mysqli_error());  
			 WHILE($row = mysqli_fetch_array($cars)){
				?>
<form method="post" action="edit_vehicle_data.php" style="padding:10px; font-size:22px; color:#fff;">
<input type="hidden" name="id" value="<?php  echo $row['id']; ?>" />
<table width="100%">
  <tr><td>Car Type :</br><select name="type" class="selecttext" required="required">
  <option><?php  echo $row['type']; ?></option>
  <option>Automatic</option>
  <option>Mnual</option>
  <option>Both</option>
  </select>
  </td>
  <td>Car Model :</br><select name="model" class="selecttext" required="required">
  <option><?php  echo $row['model']; ?></option>
  <option>Bus</option>
  <option>Car</option>
  </select>
  </td></tr>
  <tr><td>Year of manufacturer :</br><input type="text" name="year" value="<?php  echo $row['year']; ?>" class="selecttext" required="required">  </td>
  <td>Car Number :</br><input type="text" name="regno" value="<?php  echo $row['regno']; ?>" class="selecttext" required="required">
  </td>
  </td></tr>
  <tr><td>Post Title :</br><input type="text" name="title" value="<?php  echo $row['title']; ?>" class="selecttext" required="required">
  </td>
  <td>Post Description :</br><textarea name="description" class="textarea1" required="required"><?php  echo $row['description']; ?></textarea>
  </td>
  </td></tr>
    <tr><td>Availability Status :</br><select name="status" class="selecttext" required="required">
  <option><?php  echo $row['status']; ?></option>
  <option>Available</option>
  <option>Not Available</option>
  </select>
  </td>
  <td>
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
  Car Type :</br><select name="type" class="selecttext" required="required">
  <option>Nissan</option>
  <option>Bus</option>
  <option>Car</option>
  </select>
  </br></br>
  Car Model :</br><select name="model" class="selecttext" required="required">
  <option>Nissan</option>
  <option>Bus</option>
  <option>Car</option>
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
