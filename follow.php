<?php
include ("config.php");
include ("functions/functions.php");
session_start();

$username = $_SESSION['name'];

if(isset($_GET['username'])){
$uname= $_GET['username'];
}




/*$result = mysqli_query($con, $sql_statement);
echo $sql_statement." ". $result;*/
if($uname == $username)
{
    echo "You cannot follow yourself";
}
else
{
  $select_admin = "select * from connections where followername='$username' AND followeename= '$uname'";
  $query= mysqli_query($con, $select_admin);
  $check_admin = mysqli_num_rows($query);
  if ($check_admin == 1) {
    echo "<script>window.open('members.php','_self')</script>";

  }

  else if ($check_admin == 0){
     $sql_statement = "INSERT INTO connections(followername, followeename)
                  VALUES ('$username', '$uname')"; 
 
    
    $result = mysqli_query($con, $sql_statement);
    //echo $sql_statement. " ". $result;

  
    if($result == '1')
    {
        echo "User is followed successfully";

    }

    //echo "User is reported successfully";
    else
    {
        echo "User is not followed";
    }
     }
}


?>