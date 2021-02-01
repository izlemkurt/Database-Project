
<!Doctype html>
<html>
<style>
  body {
  background-color:   #ffffe6;
}
.btn-group button {
  background-color: #4CAF50; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  width: 50%; /* Set a width if needed */
  display: block; /* Make the buttons appear below each other */
}

.btn-group button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}

</style>
<body>
<div align ="center">
  <br>
  <h1>Edit Profile</h1>
  <br>
<div class="btn-group">
  <form method="POST" action="edit_username.php">
  <button>Change Username</button>
</form>
<br>
  <form method="POST" action="edit_passw.php">
  <button>Change Password</button>
</form>
 <br>
 <form method="POST" action="edit_bio.php">
  <button>Change Bio</button>
</form>
  <br>
  <form method="POST" action="change_pimage.php">
  <button>Edit Profile Picture</button>
</form>
  <br>
  <form method="POST" action="delete.php">
  <button>Delete Account</button>
</form>
  <br>
  <form method="POST" action="deac.php">
  <button>Deactivate Account</button> 
</form>
<br>
  <form method="POST" action="activate.php">
  <button>Activate Account</button> 
</form>
</div>
</div>

</body>
</html>


<!-- <html>
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
<br>
<h3>Change Your Bio</h3>
<div>
  <form action = "change_passw.php" method = "POST">
    <label for="fname">Username</label>
    <input type="text" id="fname" name="name" placeholder="Type your username">
    
    <form action = "change_passw.php" method = "POST">
    <label for="lname">Bio</label>
    <input type="text" id="lname" name="bio" placeholder="Type your new bio">
    <input type="submit" value="Submit">
  </form>
  </form>
</div>

</body>
</html> --> 