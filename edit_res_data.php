
<?php
	//edit_data.php
include_once('config/config.php');
$id = $_POST['id'];
	extract($_REQUEST);
	$order = "UPDATE reservations
	          SET regno ='$regno', 
			  date = '$date'
			  
	          WHERE
	          id=$id";
	mysqli_query($con, $order);
	header("location: user_reserve.php");
	?>