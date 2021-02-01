<?php
session_start();

include("config.php");

	if (isset($_POST['login'])) {

		$usern = htmlentities(mysqli_real_escape_string($con, $_POST['inputUsername']));
		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['inputPassword']));

		$select_user = "select * from users where username='$usern' AND passw='$pass'";
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['username'] = $usern;

            echo $usern . " ". $pass . "<br>";
			//echo "<script>window.open('home.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Password is incorrect')</script>";
		}
	}
?>