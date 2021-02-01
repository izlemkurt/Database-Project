<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'social_media';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
session_start();

if (isset($_POST['receiver'])) {
 //$sender = $_POST['sender'];
 $receiver = $_POST['receiver'];
 $text  = $_POST['text'];
$uname=$_SESSION['name'];
 echo $uname . " ". $receiver ." ". $text . "<br>";

$sql_statement = "INSERT INTO messages(sender, receiver, message)
                  VALUES ('$uname', '$receiver', '$text')"; 

echo $sql_statement;
$result = mysqli_query($con, $sql_statement);
echo "Message is sent successfully";
header("Location: messages.php");

}
else
{
    echo "The form is not set.";
}

?>