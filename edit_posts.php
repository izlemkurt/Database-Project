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

if (isset($_POST['content'])) {
 
    $postid = $_POST['postid'];
    $content = $_POST['content'];
    
    $sql_statement = "SELECT postid FROM uploaded_posts WHERE postid = '$postid' "; 
    $result = mysqli_query($con, $sql_statement);  
    $resultId = mysqli_fetch_assoc($result)["postid"];

    //echo $sql_statement. " ". $result;

    if ($postid == "")
    {
        echo "Please write your postid. Do not leave it empty! ";
    }
    else if($resultId == $postid)
    {
        $sql_statement2 = "UPDATE uploaded_posts SET post_text = '$content' WHERE postid = '$postid' "; 
        

        $result2 = mysqli_query($con, $sql_statement2);
       
        //echo $sql_statement2. " ". $result2;

        if($result2 == 1)
        {
            echo "Post is editted successfully ";
            
        }
        else
        {
            echo "There is a problem. Try again! ";
        }
        
    }
    else {

        echo "Write the correct postid. Try again! ";
    }
}
else
{
    echo "The form is not set.";
}

?>
