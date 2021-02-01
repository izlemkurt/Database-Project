<?php
include ("config.php");
include ("profile.php");
//session_start();

$username = $_SESSION['name'];

/*if(isset($_GET['username'])){
$uname= $_GET['username'];
}*/




/*$result = mysqli_query($con, $sql_statement);
echo $sql_statement." ". $result;*/
if(isset($_GET['tagid']))
{
    $tagid= $_GET['tagid'];
    $sql_statement = "DELETE  FROM subscribetags
                  WHERE username='$username' and tagid='$tagid'"; 
    $result = mysqli_query($con, $sql_statement);
    if($result == '1')
    {
        echo "You unsubscribed successfully";
    }
    //echo "User is reported successfully";
    else
    {
        echo "You could not unsubscribed";
    }
}
else
{
     $locid=$_GET['locid'];
     $sql_statement = "DELETE  FROM subscribeloc
                  WHERE username='$username' and locid='$locid'"; 
    
    $result = mysqli_query($con, $sql_statement);
    //echo $sql_statement. " ". $result;
    if($result == '1')
    {
        echo "You unsubscribed successfully";
    }
    //echo "User is reported successfully";
    else
    {
        echo "You could not unsubscribed";
    }
}


?>