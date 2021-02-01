<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'social_media';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
//global $con;
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
session_start();
if(isset($_GET['postid']))
{
    $postid = $_GET['postid'];
}
if (isset($_GET['postid'])) {
 //$sender = $_POST['sender'];
    $postid = $postid;
    $username = $_SESSION['name'];
    $reportid = rand(100,100000); 
    

    $sql_statement = "INSERT INTO report_posts(postid, username)
                      VALUES ('$postid', '$username')"; 
    
    $result = mysqli_query($con, $sql_statement);
 //   echo $sql_statement.  " ". $result;

    if($result == 1)
    {
        echo "Post is reported successfully";
    }
    //echo "User is reported successfully";
    else
    {
        echo "Post could not reported ";
    }

// echo $sql_statement;
// $result = mysqli_query($con, $sql_statement);

//echo "User is reported successfully";


}
else
{
    echo "The form is not set.";
}

?>