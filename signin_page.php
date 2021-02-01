
<!DOCTYPE html>
<html>
<head>

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
  font-size: 40px;
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


  <title></title>
</head>
<body>
  <div align ="center">
    <br>
    <br>
    <br>
    
    <h1>Joined successfully </h1>

  <form method="POST" action="index.php">
  <button class="button button1 " type = "sign" class = "btn btn-primary btn-block btn-lg">Let's get started!</button>
  <?php
      if(isset($_POST['sign'])){
          echo "<script>window.open('index.php','_self')</script>";
      }
  ?>
    

    
        
                          
  


  </form>
</div>

</body>
</html>