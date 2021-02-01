
<?php
// Change this to your connection info.
/*$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'social_media';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);*/
include ("config.php");

/*if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());*/
//}

session_start();

if(isset($_GET['username']))
{
    $username =$_GET['username'];
}
if (isset($_GET['username'])) {
 //$sender = $_POST['sender'];
    $reported =$username;
    $reporter=$_SESSION['name'];


    if($reported == $reporter)
    {
        echo "You cannot report yourself";
    }
    else
    {
        $select_admin = "select * from reported_users where Reporter='$reporter' AND Reported='$reported'";
  $query= mysqli_query($con, $select_admin);
  $check_admin = mysqli_num_rows($query);
  if ($check_admin == 1) {
    echo "<script>window.open('user_profile.php','_self')</script>";

  }

  else if ($check_admin == 0){
        //global $con;

        $sql_statement = "INSERT INTO reported_users(Reporter, Reported)
                          VALUES ('$reporter', '$reported')"; 
        
        $result = mysqli_query($con, $sql_statement);
      //  echo $sql_statement. " ". $result;
        if($result == 1)
        {
            echo "User is reported successfully";
        }
        //echo "User is reported successfully";
        else
        {
            echo "User is not reported successfully";
        }
    }
    }



// $result = mysqli_query($con, $sql_statement);

//echo "User is reported successfully";


}
else
{
    echo "The form is not set.";
}

?>