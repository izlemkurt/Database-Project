

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
</style>

</head>
<body>
<div align ="center">

<br>
<br>
<?php
  session_start();
  $username = $_SESSION['name'];
  echo $username;
?>
<br>
<b>Do you want to deactivate your account?</b>
<br>
<br>
<form action = "deactivate.php" method = "POST">
	<!-- <input type="text" name="name" placeholder="Type your username"><br> -->
	<input type="hidden" name="name" value="<?php echo $username; ?>" />
	<button class="button button ">Deactivate</button>
</form>
</div>
</body>
</html>