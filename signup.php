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
	<div class="toplinks"><a href="signup.php">Sign Up</a></div>
	<div class="toplinks"><a href="login.php">Log In</a></div>
	<div class="toplinks"><a href="about.php">About Us</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg"><h4>Already have an account?? <a href="login.php">Sign in here</a></h4></div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>Sign Up Here</h2>  
	<?php
include("config/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$customer_name=$_POST['customer_name'];
$customer_email=$_POST['customer_email'];
$customer_nationality=$_POST['customer_nationality'];
$customer_residence=$_POST['customer_residence'];
$customer_phone=$_POST['customer_phone'];
$customer_occupation=$_POST['customer_occupation'];
$customer_password=md5($_POST['customer_password']);
$confirm=md5($_POST['confirm']);

/* Now we will check if product is already in use or not */
$result=mysqli_query($con, "SELECT * FROM customers WHERE customer_email='".$customer_email."' ");
// $checkuser=mysql_num_rows($queryuser);
if(mysqli_fetch_row($result) > 0)
{ 
$message =  "<h3>Sorry, a customer with the email [ <font color=red>".$customer_email." </font> ] already exists*.</h3>";
 }
else if ($customer_password != $confirm) {
$message =  "<h3>Sorry, password and confirm password fields do not match*.</h3>";
}
else {
/* Now we will write a query to insert product details into database */
$sql="Insert into customers (customer_name,customer_email,customer_nationality,customer_residence,customer_phone,customer_occupation,customer_password) values('$customer_name','$customer_email','$customer_nationality','$customer_residence','$customer_phone','$customer_occupation','$customer_password')";
$result=mysqli_query($con,$sql);
{ $message =  "<h3>User [ <font color=#fff>".$customer_email."</font> ] is successfully registered.Please Sign in</h3>"; }
 }
/* closing the if else statements */
}
?>
<p style="margin: 6px;"><?php echo @$message; ?></p>
  <form method="post" action="signup.php" style="padding:10px; font-size:22px; color:#fff;">
    <fieldset>
    <table border="1" width="100%">
    <tr>
      <td>
        Customer name :</br><input type="text" name="customer_name" class="selecttext" required="required">
      </td>
      <td>
        Email :</br><input type="text" name="customer_email" class="selecttext" required="required">
      </td>
    </tr>
    <tr>
      <td>
        Nationality :</br><input type="text" name="customer_nationality" class="selecttext" required="required">
      </td>
      <td>
        Residence :</br><input type="text" name="customer_residence" class="selecttext" required="required">
      </td>
    </tr>
    <tr>
      <td>
        Phone :</br><input type="text" name="customer_phone" class="selecttext" required="required">
      </td>
      <td>
        Occupation  :</br><input type="text" name="customer_occupation" class="selecttext" required="required">
    </tr>

   <tr><td> Password :</br><input type="password" name="customer_password" class="selecttext" required="required">
   </td><td>
   Confirm Password :</br><input type="password" name="confirm" class="selecttext" required="required">
   </td></tr>
    <tr><td><input type="submit" name="signup" class="button100" value="Sign Up">
    </td>
    <td>
      
      </td>
    </td></tr>
    </table>
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
		$queryuser=mysql_query("SELECT * FROM cars WHERE type='".$type."' AND model='".$model."' AND year='".$year."' ");
$checkuser=mysql_num_rows($queryuser);
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
