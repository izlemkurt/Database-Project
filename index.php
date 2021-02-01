<!DOCTYPE html>
<?php
include ("intro.php");
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Site title</title>
		<meta name="description" content="Bootstrap Recitation">
		<meta name="author" content="CS306-201802">

		<!-- Bootstrap files -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>

	<body>

		<div class = "jumbotron jumbotron-fluid">
			<div class = "container">
				<h1 class = "display-4"> Welcome to Social Media</h1>
				<p class="lead">Connect with friends and world around you</p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">&nbsp;</div>
			</div>

			<div class = "row justify-content-md-center">
				<div class = "col"></div>
				<div class= "col-md-auto">
					<h2> Login
						<small class = "text-muted">User Panel </small>
					</h2>
				</div>
				<div class="col"></div>
			</div>

			<div clas="text-center">
				<img src= "images/cool.jpg" class = "rounded" alt = "Insta Logo" width="128">
			</div>
			<div class = "row">
				<div class = "col"> &nbsp;</div>
			</div>
			     
			<div class = "row justify-content-md-center">
				<div class = "col-3"></div>
				<div class = "col-6">

					<form method="post" action="auth.php">
						<div class = "form-group row">
							<label for = "inputUsername" class = "col-sm-2 col-form-label">Username </label>
							<div class = "col-sm-10">
								<input type="text" class = "form-control" id="inputUsername" name="inputUsername" placeholder="Username">
							</div>
							<div class = "form-group row">
							<label for = "Password" class = "col-sm-2 col-form-label">Password </label>
							<div class = "col-sm-10">
								<input type="password" class = "form-control" id="inputPassword" name="inputPassword" placeholder="Password">
								
							</div>
						</div>
						
						<a href="forgot_passw.php" id="forgot">Forgot Password?</a>
						<button type = "login" class = "btn btn-primary btn-block btn-lg">Login</button>
						


					</form>


					<br>

					<div class = "col"></div>
					<div class= "col-md-auto">
						<h2> Sign Up
							<small class = "text-muted">New to Social Media? </small>
						</h2>
						<form method="POST" action="signup.php">
                			<button type = "signup" class = "btn btn-primary btn-block btn-lg">Sign Up</button>
                			<?php
                    			if(isset($_POST['signup'])){
                        			echo "<script>window.open('signup.php','_self')</script>";
                    			}
                			?>
            			</form>


					</div>



				</div>

		</div>

	</body>
</html>
