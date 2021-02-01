<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
  <style>
body  {
  background-image: url("signin.png");
  background-size: cover;
  
}
</style>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button1 {
  box-shadow: 0 24px 64px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
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
  font-size: 40px;
  color: white;
}
</style>
<body>
	<div align= "center">
		<h1>Welcome to the Admin Panel</h1>
		<br>
		<br>
		<br>
		Please enter your admin id:
		<form action= "admins.php" method ="GET">
			<input type ="text" name= "adminid"><br>
			<button class="button button2 " type = "login" class = "btn btn-primary btn-block btn-lg">SEND!</button>
		</form>
	</div>

</body>
</html>