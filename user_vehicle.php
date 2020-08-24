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
<h2>MANAGE VEHICLES</h2>
<table width="100%" border="1">
<tr>
 <th>Transmission Type</th>
				  <th>Body Type</th>
                  <th>Manufactured Year</th>
				  <th>Registration No.</th>
                  <th>Title</th>
				  <th>Status</th>
				  <th>Action</th>
</tr>
	<?php
  define('MAX_REC_PER_PAGE', 10);
  include("config/config.php");
  $result = mysqli_query($con, "SELECT COUNT(*) FROM cars ORDER BY id DESC  ") or die("Count query error!");
  list($total) = mysqli_fetch_row($result);
  $total_pages = ceil($total / MAX_REC_PER_PAGE);
  $page = intval(@$_GET["page"]); 
  if (0 == $page){
  $page = 1;
  }  
  $start = MAX_REC_PER_PAGE * ($page - 1);
  $max = MAX_REC_PER_PAGE;
  $result = mysqli_query($con, "SELECT * FROM cars ORDER BY id
   DESC LIMIT $start, $max") or die("cars order list query error!");
?>
  <?php
  while($row = mysqli_fetch_array($result)) {
   $id = $row['id'];
				$type = $row['type'];
				$model = $row['model'];
				$year = $row['year'];
				$title = $row['title'];
                $file = $row['file'];				
                $status = $row['status'];
  ?>
  <tr style="color: #ffffff; background: #303030;">
 <td><?php echo $type; ?></td>
                  <td><?php echo $model; ?></td>
                  <td><?php echo $year; ?></td>
				  <td><?php echo $title; ?></td>
				  <td>  <img src="upload/<?php echo $file; ?>" width="90" height="90">  </td>
				  <td><?php echo $status; ?></td>
				<td>
				<a href="user_view.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color:#808080;">View Vehicle details</a>&nbsp;&nbsp;&nbsp;
				<a href="user_reservation.php?regno=<?php echo $row['regno']; ?>" style="text-decoration:none;"><img src="images/book.png">BOOK</a>&nbsp;&nbsp;&nbsp;
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
