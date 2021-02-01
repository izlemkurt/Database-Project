<?php
include ("config.php");
if($_SERVER['REQUEST_METHOD']== "POST")
{
    session_start();
    $username = $_SESSION['name'];
    //echo "Hi " . $username;
   
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "" )
    {
      $filename =  "uploads/".$_FILES['file']['name'];
      move_uploaded_file($_FILES['file']['tmp_name'],  $filename);
      if(file_exists($filename))
      {
        $select_user = "update users set profile_picture = '$filename' where username = '$username'";
        $query= mysqli_query($con, $select_user);
        $result = mysqli_query($con, $select_user);
        //echo "Result is " . $result;
        header(("Location: profile.php"));
        die;
      }
    }
    else
    {
      
      header(("Location: change_pimage.php"));
      echo "Please choose file.";
      die;
    }
   
  
    
}
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>

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
h2 {
  font-family: "Times New Roman", Times, serif;
  font-size: 20px;
}
</style>

</head>
<body>
<div align ="center">

<br>
<br>


<br>



<br>
<br>

<div style = "min-height: 400px; flex:2.5;padding: 20px;padding-right: 0px; ">
  <form method="post" enctype="multipart/form-data">
    <div style="border:solid thin #aaa; padding: 10px; background-color: white">
        <input type="file" name="file">
        <button class="button button ">Change</button>
      </div>
    </form>
</form>
</div>
</body>
</html>