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
    echo "You cannot unfollow yourself";
}
else
{
     $sql_statement = "DELETE  FROM connections
                  WHERE followername='$username' and followeename= '$uname'"; 
    
    $result = mysqli_query($con, $sql_statement);
   // echo $sql_statement. " ". $result;
    if($result == '1')
    {
        echo "User is unfollowed successfully";
    }
    //echo "User is reported successfully";
    else
    {
        echo "User is not unfollowed";
    }
}


?>