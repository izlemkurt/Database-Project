<?php
include ("config.php");
//include("signin_page.php");
$username = $_POST['name'];
$password = $_POST['password'];
$bio = $_POST['bio'];
$foo = True;

if(empty($_POST['name']) || empty($_POST['password'] || empty($_POST['bio'])))
 {
  	echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('signup.php')</script>";  // go back to the login page
     $foo = False;
 
 }
 if(empty($_POST['name']))
 {
  	echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('signup.php')</script>";  // go back to the login page
     $foo = False;
 
 }
 if(empty($_POST['password']))
 {
  	echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('signup.php')</script>";  // go back to the login page
     $foo = False;
 
 }
  if(empty($_POST['bio']))
 {
  	echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('signup.php')</script>";  // go back to the login page
     $foo = False;
 
 }


if (isset($_POST['name'], $_POST['password'], $_POST['bio'] ) && $foo == True) {
	$username = $_POST['name'];
	$password = $_POST['password'];
	$bio = $_POST['bio'];
		
	$select_user = "select * from users where username='$username'";
	$query= mysqli_query($con, $select_user);
	$check_user = mysqli_num_rows($query);

	if($check_user == 1){
		echo "<script>alert('Your username must be unique.');</script>";
		echo"<script>location.assign('signup.php')</script>";
	}
	else
	{
		$sql_statement = "INSERT INTO users(bio, passw, profile_picture, username, deactivate, followers)
					  VALUES ('$bio', '$password', NULL, '$username', '0', '0')";

		$result = mysqli_query($con, $sql_statement);
			//echo "Result is " . $result;
		if ($result == '1') {
			echo $username . " " . "welcome to social media". "<br>";
		//	echo "Result is " . $result;
			include("signin_page.php");
		}
		else
		{
			echo "<script>alert('Please try again.');</script>";

	    	echo"<script>location.assign('signup.php')</script>";
		}
	}

}
  
else
{
	echo "The form is not set.";
}

?>