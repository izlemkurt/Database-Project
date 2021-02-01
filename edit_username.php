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

  body {
  background-color:   #ffffe6;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>Change Your Username</h3>
<?php
  session_start();
  $username = $_SESSION['name'];
  echo $username;
?>

<div>
  <form action = "change_username.php" method = "POST">
    <input type="hidden" name="name" value="<?php echo $username; ?>" />

    <label for="lname">New username</label>
    <input type="text" id="lname" name="newname" placeholder="Type your new username">

   
  
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
