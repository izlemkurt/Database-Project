<?php

session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'social_media';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
include ("config.php");

if(isset($_POST['topic']))
{
    $usern= $_SESSION['name'];
    $topic= $_POST['topic'];
   
    $query = "SELECT T.tagid FROM tags T WHERE T.topicname='$topic'"; 

    $result = mysqli_query($con, $query);
    $resultId = mysqli_fetch_assoc($result)["tagid"];
   
    
    $sql_statement = "INSERT INTO subscribetags(username, tagid) VALUES ('$usern', '$resultId')";

    $result = mysqli_query($con, $sql_statement);

     if (mysqli_query($con, $sql_statement)) {
      header("Location: home.php?sub=success");
    } else {
      header("Location: home.php?sub=fail");
    }

    //echo $usern ." ". $topic . "<br>";
   echo "result is: ". $result;
}
else
{
    echo "The form is not set.";
}

?>