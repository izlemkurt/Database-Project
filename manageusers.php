<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<style>
body  {
  background-image: url("signup.jpg");
  background-size: cover;
  
}
</style>
<style> 
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>

<style>
.button {
  background-color: #008CBA; 
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button {padding: 14px 40px;}


</style>
<style>
body {
  background-color: black;
  font-family: Verdana, sans-serif;
  font-size: 30px;
  color: gray;  
}

h1 {
  font-family: Georgia, serif;
  font-size: 60px;
  color: white;
}
</style>

</body>
</html>
<?php
include ("config.php");


$adminid= $_POST['adminid'];
if (isset($_POST['deadline'])) {
    $username = $_POST['username'];
    $deadline = $_POST['deadline'];
//    $adminid =$_POST['adminid'];

/*if(empty($_POST['username']) || empty($_POST['deadline']))
 {
    echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('admins.php')</script>";  // go back to the login page   
 }*/
 if ( !isset($_POST['username'], $_POST['deadline']) ) {
  // Could not get the data that should have been sent.
  exit('Please fill both the username and deadline fields!');
}


$select_admin = "select * from manage_users where adminid='$adminid' AND username= '$username'";
  $query= mysqli_query($con, $select_admin);
  $check_admin = mysqli_num_rows($query);
  if ($check_admin == 1) {
   
    $sql_statement = "UPDATE manage_users  SET deadline = '$deadline' WHERE username ='$username' and adminid= $adminid";
    $result = mysqli_query($con, $sql_statement);
    if ($result==1){
    echo "You suspended ".$username." until ". $deadline;
  }
    }

  else if ($check_admin == 0){

    $sql_statement = "INSERT INTO  manage_users(deadline, username, adminid)
                      VALUES ('$deadline', '$username', '$adminid')";
    $result = mysqli_query($con, $sql_statement);
    if ($result==1){
    echo "You suspended ".$username." until ". $deadline;
    }
  }


}
else
{
	echo "The form is not set.";
}

?>