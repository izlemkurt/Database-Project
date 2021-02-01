<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>Change Your Password</h3>

<div>
  <form action = "change_passw.php" method = "POST">
    <label for="fname">Username</label>
    <input type="text" id="fname" name="name" placeholder="Type your username">

    <label for="lname">Password</label>
    <input type="text" id="lname" name="password" placeholder="Type your new password">

   
  
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>






<!-- 
<html>

	<body>
	<div align ="center">
	<b>Change Password</b>
	<br>
	<br>
	<form action = "change_passw.php" method = "POST">
		<input type="text" name="name" placeholder="Type your username"><br>
		<input type="text" name="password" placeholder="Type your new password"><br>

		<button class="button ">Submit</button>
	</form>
	</div>
	</body>
</html> -->