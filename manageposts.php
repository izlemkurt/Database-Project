<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<style>
body  {
  background-image: url("signup.jpg");
  background-size: cover;
  
}
</style>
<style> 
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>

<style>
.button {
  background-color: #008CBA; 
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button {padding: 14px 40px;}


</style>
<style>
body {
  background-color: black;
  font-family: Verdana, sans-serif;
  font-size: 30px;
  color: gray;  
}

h1 {
  font-family: Georgia, serif;
  font-size: 60px;
  color: white;
}
</style>

</body>
</html>
<?php
include ("config.php");
$adminid= $_POST['adminid'];
if (isset($_POST['postid'])) {
    $hideident = $_POST['hideident'];
    $postid = $_POST['postid'];
 //   $adminid =$_POST['adminid'];

if ( !isset($_POST['hideident'], $_POST['postid']) ) {
  // Could not get the data that should have been sent.
  exit('Please fill both the hideident and postid fields!');
}
  $select_admin = "select * from manage_posts where adminid='$adminid' AND postid= '$postid'";
  $query= mysqli_query($con, $select_admin);
  $check_admin = mysqli_num_rows($query);
  if ($check_admin == 1) {
   
    $sql_statement = "UPDATE manage_posts SET 
    hideident=$hideident WHERE postid=$postid AND adminid =$adminid";
    $result = mysqli_query($con, $sql_statement);
    if ($result==1)
       if($hideident==0)
         echo "<b>You unhide the post <b>".$postid;
      else
         echo "<b>You hide the post <b>".$postid;
    }

  else if ($check_admin == 0){

//if($hideident=='1'){
$sql_statement = "INSERT INTO  manage_posts(hideident, postid, adminid)
                  VALUES ('$hideident', '$postid', '$adminid')";
$result = mysqli_query($con, $sql_statement);
if ($result==1){
//echo "<b>You hide the post <b>".$postid;
 if($hideident==0)
     echo "<b>You unhide the post <b>".$postid;
  else
     echo "<b>You hide the post <b>".$postid;
}
}
  
    }

/*else if($hideident=='0'){
$sql_statement = "UPDATE manage_posts SET 
hideident=0 WHERE postid=$postid AND adminid =$adminid";
$result = mysqli_query($con, $sql_statement);
if ($result=1)
echo "<b>You unhide the post <b>".$postid;
}*/
//}



//}
else
{
	echo "The form is not set.";
}

?>