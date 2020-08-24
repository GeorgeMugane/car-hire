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
	<div class="toplinks"><a href="signup.php">Sign Up</a></div>
	<div class="toplinks"><a href="login.php">Log In</a></div>
	<div class="toplinks"><a href="about.php">About Us</a></div>
	<div class="toplinks"><a href="contact.php">Contact us</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Don't have an account?? <a href="signup.php">Sign Up here</a></div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>Sign In Here</h2>
<?php
 include_once('config/config.php');
if(isset($_POST['sign'])){
		
// Inialize session
session_start();

// Retrieve email and password from database according to user's input
$login = mysqli_query($con, "SELECT * FROM login WHERE (email = '" . $_POST['email'] . "') and (password = '" . md5($_POST['password']) . "')  ");
$display = mysqli_fetch_array($login);	
// Check email and password match
if (mysqli_num_rows($login) == 1) {
// Set email session variable
$_SESSION['email'] = $_POST['email'];

$_SESSION['fullname']=$display['fullname'];

$type= $display['type'];

if ($type=='Customer'){
				  header("location: user_index.php");
				  }
				  elseif ($type=='Staff'){				
				  header("location: administrator.php");
				  }						
				}
				 else 
				{
				  echo "<center><h2>Wrong username or password.</h2></center>";
				  }	
				}			
?>
<p style="margin: 6px;"><?php echo @$message; ?></p>
  <form method="post" action="login.php" style="padding:10px; font-size:22px; color:#fff;">
  <fieldset>
 Email Address :</br><input type="email" name="email" class="selecttext" required="required">
  </br></br>
  Password :</br><input type="password" name="password" class="selecttext" required="required">
 </br></br>
  <input type="submit" name="sign" class="button100" value="Log In">
  </fieldset>
  </form>
	
	</div>
  <div class="left_content">
  <h2 style="height:30px; width:292px; background:#000000; margin-top:-1px; padding: 6px;">Check Availability of Car</h2>
  
  <?php
  include_once('config/config.php');
if(isset($_POST['check'])){
        $type = $_POST['type'];
		$model = $_POST['model'];
		$year = $_POST['year'];
		$queryuser=mysqli_query($con, "SELECT * FROM cars WHERE type='".$type."' AND model='".$model."' AND year='".$year."' ");
$checkuser=mysqli_num_rows($queryuser);
//$regno = $checkuser['regno'];
if($checkuser != 0)
{ 
$query = mysqli_query($con,"select * from cars where type='".$type."' AND model='".$model."' AND year='".$year."' ORDER BY id DESC LIMIT 1") or die(mysqli_error());
		while($row = mysqli_fetch_array($query)) {
		$regno = $row['regno'];
		
?>
<b style="padding-left: 6px; padding-right: 6px;">Car with your specifications is available. 
 Go to <a href="reservations.php?regno=<?php echo $row['regno']; ?>" style="color:#fff;"><b>Reservations</b></a></b>
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
  <input type="submit" name="check" class="button100" value="Check Availability">
  </form>
  </div>
 </div>
 </div>
</body>
</html>
