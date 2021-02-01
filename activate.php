<?php
include ("config.php");
session_start();

if (isset($_SESSION['name'] )) {
	$username = $_SESSION['name'];
	//$sql_statement = "UPDATE users SET deactivate = '1' WHERE username = '$username'";
	$select_user = "UPDATE users SET deactivate = '0' WHERE username = '$username'";
  	$query= mysqli_query($con, $select_user);
   	//echo "You are deactivated.";
	$result = mysqli_query($con, $select_user);
	//echo "Result is " . $result;
	include("activepage.php");
}
?>

