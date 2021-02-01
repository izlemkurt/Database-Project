
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

<?php
 
  session_start();
  $username = $_SESSION['name'];
  echo "Hi " . $username;
?>
<br>

<h2>We're sorry to hear you'd like to delete your account.</h2> 
<h2>If you're just looking to take a break, you can always <a href="deac.php" id="forgot">temporarily disable</a> your account instead. </h2> <br>


<b>Do you want to delete your account permanently?</b>
<br>
<br>
<form action = "deleting.php" method = "POST">
  <!-- <input type="text" name="name" placeholder="Type your username"><br> -->
  <input type="hidden" name="name" value="<?php echo $username; ?>" />
  <button class="button button ">Delete</button>
</form>
</div>
</body>
</html>