<?php
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
	<div class="toplinks"><a href="user_index.php">Home</a></div>
	<div class="toplinks"><a href="user_vehicle.php">Vehicle details</a></div>
	<div class="toplinks"><a href="user_reserve.php">Reservations</a></div>
	<div class="toplinks"><a href="user_about.php">About Us</a></div>
	<div class="toplinks"><a href="user_contact.php">Contact Us</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Rental Cars Available</div>
    <div class="headingbg2"></div>

	<div class="main_content">
	<?php
	  include_once('config/config.php');
  define('MAX_REC_PER_PAGE', 6);
  $result = mysqli_query($con,"SELECT COUNT(*) FROM cars WHERE status='Available' ") or die("Count query error!");
  list($total) = mysqli_fetch_row($result);
  $total_pages = ceil($total / MAX_REC_PER_PAGE);
  $page = intval(@$_GET["page"]); 
  if (0 == $page){
  $page = 1;
  }  
  $start = MAX_REC_PER_PAGE * ($page - 1);
  $max = MAX_REC_PER_PAGE;
  $result = mysqli_query($con,"SELECT * FROM cars WHERE status='Available' ORDER BY id
   DESC LIMIT $start, $max") or die("Cars query error!");
  
?>
  <?php
  while($row = mysqli_fetch_array($result)) {
   $file = $row['file'];
		$title = $row['title'];
		$regno = $row['regno'];
		$description = $row['description'];
  ?>
	<a href="user_reservation.php?regno=<?php echo $row['regno']; ?>" style="text-decoration:none;">
<div class="pic100">
	<img src="upload/<?php echo $file; ?>" width="299" height="200"/>
	<div class="caption1"><b style="font-size:16px;"><?php echo $title; ?></b>
	</br><?php echo $description; ?></div>
	</div></a>
	<?php } ?>
	
	</br></br>
 	<table width="100%">
  <tr>
  <td>GO TO PAGE:</td>
  <?php
  for ($i = 1; $i <= $total_pages; $i++) {
  $txt = $i;
  if ($page != $i)
  $txt = "<a href=\"" . $_SERVER["PHP_SELF"] . "?page=$i\">$txt</a>";
  ?>  
  <td align="left"><font color="#B52025"><?php echo" $txt ";?></font></td>
  <?php
  }
  ?>
  </tr>
  </table>

  </div>
  <div class="left_content">
  <h2 style="height:30px; width:292px; background:#000000; margin-top:-1px; padding: 6px;">Check Availability of Car</h2>
  
  <?php
  include_once('config/config.php');
  if($_SERVER["REQUEST_METHOD"] == "POST")
{
        $type = $_POST['type'];
		$model = $_POST['model'];
		$year = $_POST['year'];
		$queryuser=mysqli_query($con, "SELECT * FROM cars WHERE type='".$type."' AND model='".$model."' AND year='".$year."' ");
$checkuser=mysqli_num_rows($queryuser);
//$regno = $checkuser['regno'];
if($checkuser != 0)
{ 
$query = mysqli_query($con, "select * from cars where type='".$type."' AND model='".$model."' AND year='".$year."' ORDER BY id DESC LIMIT 1") or die(mysqli_error());
		while($row = mysqli_fetch_array($query)) {
		$regno = $row['regno'];
		
?>
<b style="padding-left: 6px; padding-right: 6px;">Car with your specifications is available. 
 Go to <a href="user_reservation.php ?regno=<?php echo $row['regno']; ?>" style="color:#fff;"><b>Reservations</b></a></b>
<?php
}
 }
else {
$message =  "Car with your specifications is not available*.";
}
}
  ?>
  <p style="margin: 6px;"><?php echo @$message; ?></p>
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
