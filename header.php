<?php
//include("config.php");
//include("functions/functions.php");
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'social_media';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php">Social Media</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	
	      	<?php 
			$user = $_SESSION['name'];
			$get_user = "select * from users where username='$user'"; 
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
					
			$user_name = $row['username'];
			$user_pass = $row['passw'];
			$user_bio = $row['bio'];
			$user_image = $row['profile_picture'];
			$deactivate_account = $row['deactivate'];
			$followers = $row['followers'];
					
					
			$user_posts = "select * from uploaded_posts P where P.username='$user_name'"; 
			$run_posts = mysqli_query($con,$user_posts); 
			$posts = mysqli_num_rows($run_posts);
			?>

	        <li><a href='profile.php?<?php echo "u_name=$user_name" ?>'><?php echo "$user_name"; ?></a></li>
	       	<li><a href="home.php">Home</a></li>
			<!-- <li><a href="members.php">Find People</a></li> -->
			<li><a href="message.php">Messages</a></li> 
            <!-- <li><a href="messages.php?<?php echo "u_name=$user_name" ?>Messages</a></li> -->
            <li><a href="members.php">Find People</a></li> 
            <li><a href="subscribe.php">Subscribe</a></li>
            <li>
				<a href='edit.php'>Edit Profile</a>
			</li>
	        <li>
				<a href='logout.php'>Logout</a>
			</li>
					<!-- <?php
						/*echo"

						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
								</li>
								<li>
									<a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
								</li>
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>
						";*/
					?> -->
			</ul>
	<!-- 		<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>
				</li>
			</ul> -->
		</div>
	</div>
</nav>