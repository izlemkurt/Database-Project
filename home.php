<!DOCTYPE html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
//session_start();
include("header.php");
include ("functions/functions.php");
// Change this to your connection info.
/*$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'social media';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);*/
/*if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());*/
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
//}
?>
<html>
<head>
	<?php
		$user = $_SESSION['name'];
		$get_user = "select * from users where username='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['username'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
<div class="row">
	<div id="insert_post" class="col-sm-12">
		<center>
		<form action="insert_posts.php?id=<?php echo $user_name; ?>" method="post" id="f" enctype="multipart/form-data">
		<textarea class="form-control" id="content" rows="4" name="content" placeholder="What's in your mind?"></textarea><br>
     	<label class="btn btn-warning" id="upload_image_button">Select Image
		<input type="file" name="image" id="image" size="30">
		</label>
		<textarea class="form-control" id="content" rows="1" name="country" placeholder="Add country name"></textarea><br>
		<textarea class="form-control" id="content" rows="1" name="city" placeholder="Add city name "></textarea><br>
		<textarea class="form-control" id="content" rows="1" name="top" placeholder="Add topic"></textarea><br>
				<button id="btn-post" class="btn btn-success" name="sub">Post</button>
		</form>
		<!-- <?php insertPost(); ?> -->
		</center>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<center><h2><strong>News Feed</strong></h2><br></center>
		<?php echo get_posts(); ?>
	</div>
</div>
</body>
</html>
