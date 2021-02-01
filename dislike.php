<?php
session_start();
include ("functions/functions.php");

include ("config.php");

$usern= $_SESSION['name'];


if(isset($_GET['postid']))
{
    $post_id=$_GET['postid'];
}

$selectid= "select * from havelikedislike where username='$usern' AND postid= '$post_id'";
  $query= mysqli_query($con, $selectid);
  $identifier = mysqli_num_rows($query);
if($identifier == 1){
$identifier = 0;

$sql_statement = "UPDATE havelikedislike
SET identifier=$identifier WHERE username ='$usern' AND postid= $post_id";


     if (mysqli_query($con, $sql_statement)) {
      header("Location: home.php?sub=success");
    } else {
      header("Location: home.php?sub=fail");
    }
}
else{

$sql_statement = "INSERT INTO havelikedislike(username, identifier, postid)
                  VALUES ('$usern', 0, '$post_id')"; 


     if (mysqli_query($con, $sql_statement)) {
      header("Location: home.php?sub=success");
    } else {
      header("Location: home.php?sub=fail");
    }


}
?>