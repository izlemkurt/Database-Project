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

	<div align="center">
    <b>Welcome to the Admin Panel!</b>
    <br>
    <br>
<?php
    include ("config.php");

if (isset($_GET['adminid'])) {
   $adminid = $_GET['adminid'];
  }
  
  $select_admin = "select * from admins where adminid='$adminid'";
  $query= mysqli_query($con, $select_admin);
  $check_admin = mysqli_num_rows($query);
  if ($check_admin == 1) {
    

  }
  else
    {echo "<script>alert('You are not an admin or incorrect id.');</script>";

     echo"<script>location.assign('index.php')</script>";  // go back to the login page
      
    }

    ?>
        <form action = "manageusers.php" method ="POST">
   
        <input type ="text" name= "deadline" placeholder="Type the deadline in form DD.MM.YYYY"><br>
        <input type="text" name="username" placeholder="Type the username"><br>
        <input type="hidden" name="adminid" value="<?php echo $adminid; ?>" />
      <button>Manage Users</button><br><br>
      
    </form>
       <form action = "manageposts.php" method ="POST">
        
        <input type="text" name ="postid" placeholder="Type the postid">
        <input type="hidden" name="adminid" value="<?php echo $adminid;?>" />
        <br>
        <input type="text" name ="hideident" placeholder="If you want to hide type 1, otherwise 0"><br>

      <button>Manage Posts</button><br>

    </form>
        
     <br><br><li><a href="searchuser.php">Seach Users</a></li> 
     <br><li><a href="reported.php">Reported Posts and Users</a></li> 
     <br><li>
        <a href='logout.php'>Logout</a>
      </li>
       
</div>

</body>
</html>
-

