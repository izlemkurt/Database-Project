<?php
session_start();

include ("config.php");
$post_id= $_POST['post_id'];
if(isset($post_id)){
//	header("location: comment.php");

	$comment= $_POST['comment'];
}
//$postid= $_POST['postid'];

$usern= $_SESSION['name'];

$sql_statement = "INSERT INTO havecomments(username, comment_text, postid)
                  VALUES ('$usern', '$comment', '$post_id')"; 

     if (mysqli_query($con, $sql_statement)) {
      header("Location: home.php?sub=success");
    } else {
      header("Location: home.php?sub=fail");
    }

?>