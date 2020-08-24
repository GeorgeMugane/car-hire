
<?php
	//edit_data.php
include_once('config/config.php');
$id = $_POST['id'];
	extract($_REQUEST);
	$order = "UPDATE cars
	          SET type ='$type', 
			  model ='$model',
			  year ='$year',
			  regno = '$regno',
			  title = '$title',
			  description = '$description',
			  status = '$status'
			  
	          WHERE
	          id=$id";
	mysqli_query($con, $order);
	header("location: manage_vehicles.php");
	?>