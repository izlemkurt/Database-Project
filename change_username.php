<?php
include ("config.php");
$username = $_POST['name'];
$newname = $_POST['newname'];
$foo = True;
// if(empty($_POST['name']))
//  {
//   	echo "<script>alert('You have an empty field.');</script>";

//      echo"<script>location.assign('forgot_passw.php')</script>";  // go back to the login page
//      $foo = False;
 
//  }
 if(empty($_POST['newname']))
 {
  	echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('edit_username.php')</script>";  // go back to the login page
     $foo = False;
 
 }
if (isset($_POST['newname']) && $foo ==True) {

  //$data = $con->query("SELECT * FROM users WHERE username = $username ");
  $select_user = "select * from users where username='$username'";
  $query= mysqli_query($con, $select_user);
  $check_user = mysqli_num_rows($query);
  if ($check_user == 1) {
   
    $select_user = "select * from users where username='$newname'";
    $query= mysqli_query($con, $select_user);
    $check_user = mysqli_num_rows($query);


    if($check_user == 1){
       echo "<script>alert('Your username must be unique.');</script>";
       echo"<script>location.assign('edit_username.php')</script>";
    }
    else
    {
          $select_user = "UPDATE users SET username = '$newname' WHERE username = '$username'";
        	$query= mysqli_query($con, $select_user);
        	$result = mysqli_query($con, $select_user);
          if($result==1)
          {
            //echo "Result is " . $result;
            include("name_page.php");
          }
        
           
      	  else
          {
              echo "<script>alert('Please try again.');</script>";

              echo"<script>location.assign('edit_username.php')</script>";
          }
      			
      		

    }
  }
}
else
{
  echo"<script>location.assign('edit_username.php')</script>";
  //header("Location: index.php");
  //exit();
}

?>