
    <?php
  include_once('config/config.php');
    $id=$_GET['id'];
    $result =("DELETE FROM users WHERE id= '$id'");
	if(mysqli_query($con,$result)){
echo "";}
    header("location: users.php");
    ?>