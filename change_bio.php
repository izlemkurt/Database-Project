<?php
//session_start();
include ("config.php");
$username = $_POST['name'];
$newbio = $_POST['bio'];
$foo = True;
// if(empty($_POST['name']))
//  {
//   	echo "<script>alert('You have an empty field.');</script>";

//      echo"<script>location.assign('forgot_passw.php')</script>";  // go back to the login page
//      $foo = False;
 
//  }
 if(empty($_POST['bio']))
 {
  	echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('edit_bio.php')</script>";  // go back to the login page
     $foo = False;
 
 }
if (isset($_POST['bio']) && $foo ==True) {

  //$data = $con->query("SELECT * FROM users WHERE username = $username ");
  $select_user = "select * from users where username='$username'";
  $query= mysqli_query($con, $select_user);
  $check_user = mysqli_num_rows($query);
  if ($check_user == 1) {
    //$con->query("UPDATE users SET passw = $newpass WHERE username = $username");
    $select_user = "UPDATE users SET bio = '$newbio' WHERE username = '$username'";
  	$query= mysqli_query($con, $select_user);
  	$result = mysqli_query($con, $select_user);
  	if ($result == '1') {
			echo "Your bio is updated.";
			//echo "Result is " . $result;
      include("home.php");
			
		}
	else
	{
		echo "<script>alert('Please try again.');</script>";

	    echo"<script>location.assign('edit_bio.php')</script>";
	}
  
  }
  else{
    echo "Please check your user name.";
   }

}
else
{
	echo"<script>location.assign('edit_bio.php')</script>";
	//header("Location: index.php");
	//exit();
}

?>