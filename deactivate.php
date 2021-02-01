<?php
include ("config.php");

if (isset($_POST['name'] )) {
	$username = $_POST['name'];
	//$sql_statement = "UPDATE users SET deactivate = '1' WHERE username = '$username'";
	$select_user = "UPDATE users SET deactivate = '1' WHERE username = '$username'";
  	$query= mysqli_query($con, $select_user);
   	//echo "You are deactivated.";
	$result = mysqli_query($con, $select_user);
	//echo "Result is " . $result;
	include("deac_page.php");
}
?>