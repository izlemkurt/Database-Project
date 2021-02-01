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
<div align ="center">
    <div class="col-sm-6" style="left:0.5%;">
            <img src="subscribe.jpg" class="img-rounded" title="have fun" width="400px" height="200px">
            
        </div>
<b>Where do you want to subscribe?</b>
<br>
<br>
<br>


<form action = "locations.php" method = "POST">
    <input type="text" name="country" placeholder="Country Name?"><br>
     <input type="text" name="city" placeholder="City Name?"><br>
    <button>Search</button>
</form>
</div>
</body>
</html>