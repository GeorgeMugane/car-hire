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
	<div class="toplinks"><a href="user_index.php">Home</a></div>
	<div class="toplinks"><a href="user_vehicle.php">Vehicle details</a></div>
	<div class="toplinks"><a href="user_about.php">About Us</a></div>
	<div class="toplinks"><a href="user_contact.php">Contact US</a></div>
  </div>
  <div id="mainarea">
    <div id="headingbg">Rental Cars Available</div>
    <div class="headingbg2"></div>

	<div class="main_content">
<h2>Manage Your Reservation</h2>

<table width="100%" border="1">
<tr>

				  <th>Fullname</th>
                  <th>Registration No.</th>
				  <th>Booked Date</th>
				  <th>Action</th>
</tr>
	<?php
  define('MAX_REC_PER_PAGE', 10);
  include("config/config.php");
  $full = $_SESSION['email'];
  $result = mysqli_query($con,"SELECT COUNT(*) FROM reservations WHERE email='$full' ORDER BY id DESC  ") or die("Count query error!");
  list($total) = mysqli_fetch_row($result);
  $total_pages = ceil($total / MAX_REC_PER_PAGE);
  $page = intval(@$_GET["page"]); 
  if (0 == $page){
  $page = 1;
  }  
  $start = MAX_REC_PER_PAGE * ($page - 1);
  $max = MAX_REC_PER_PAGE;
  $result = mysqli_query($con,"SELECT * FROM reservations WHERE email='$full' ORDER BY id
   DESC LIMIT $start, $max") or die("users order list query error!");
?>
  <?php
  while($row = mysqli_fetch_array($result)) {
   $id = $row['id'];
   $regno = $row['regno'];
				$fullname = $row['fullname'];
                $date = $row['date'];				
  ?>
  <tr style="color: #ffffff; background: #303030;">
                  <td><?php echo $fullname; ?></td>
				  <td><?php echo $regno; ?></td>
				  <td>  <?php echo $date; ?> </td>
				<td>
	<a href="edit_res.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color:#808080;">Edit</a>&nbsp;&nbsp;&nbsp;			
<a href="delete_res.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this reservation?')" style="text-decoration:none; color:#808080;">Delete</a>
				</td>
                </tr>
 <?php
   }
  ?>
  </table>
  </br></br>
 	<table width="100%">
  <tr style="background:#606060;">
  <td>GO TO PAGE:</td>
  <?php
  for ($i = 1; $i <= $total_pages; $i++) {
  $txt = $i;
  if ($page != $i)
  $txt = "<a href=\"" . $_SERVER["PHP_SELF"] . "?page=$i\">$txt</a>";
  ?>  
  <td align="left"><font color="#fff"><?php echo" $txt ";?></font></td>
  <?php
  }
  ?>
  </tr>
  </table>
  
  </div>
  <div class="left_content">
  <h2 style="height:30px; width:292px; background:#000000; margin-top:-1px; padding: 6px;">Check Availability of Car</h2>
  <form method="post" action="user/user_index.php" style="padding:10px; font-size:22px; color:#fff;">
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
