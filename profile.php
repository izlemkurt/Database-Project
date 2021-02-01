<!DOCTYPE html>
<?php
//session_start();
include("header.php");
include("config.php");
if(!isset($_SESSION['name'])){
	header("location: index.php");
}
?>
<html>
<head>
	<?php
		$user = $_SESSION['name'];
		$get_user = "select * from users where username='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['username'];
        $u_image= $row['profile_picture']

	?>


	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
	#profile-img{
		position: absolute;
		top: 160px;
		left: 40px;
	}
	#update_profile{
		position: relative;
		top: -20px;
		cursor: pointer;
		left: 93px;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%, -50%);
	}
	#button_profile{
		position: absolute;
		top: 82%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%, -50%);
	}
</style>
<body>
<div class="row">
	<div class="col-sm-2">	
	</div>
	<div class="col-sm-8">
		<?php
			echo"
			<div>
  		
			<div id='profile_picture'>
				<img src='$u_image' alt='Profile' class='img-circle' width='180px' height='185px'>
				<form action='profile.php?u_name='$user_name' method='post' enctype='multipart/form-data'>
				</form>
			</div><br>
			";
		?>
		
	</div>
   
	 <?php  $user_name = $_SESSION['name'];?>
     <div class = "col-sm-8">
        <center><h1><strong><?php echo "$user_name"; ?></strong>Posts</h1></center>
        <?php
            global $con;

		 $get_posts = "select * from uploaded_posts where username='$user_name' ORDER by 1 
        DESC LIMIT 5";
	     $run_posts = mysqli_query($con, $get_posts);
         
				while($row_posts = mysqli_fetch_array($run_posts)){

					$post_id = $row_posts['postid'];
					$user_name = $row_posts['username'];
					$content = $row_posts['post_text'];
					$upload_image = $row_posts['image']; 



            if($content == "No" && strlen($upload_image) >= 1){

                echo"
                    <div id='own_posts'>
                        <div class ='row'>
                      
                            <div class = 'col-sm-6'>
                                <h3><a style='text-decoration: none;cursor:
                                    pointer;color: #3897f0; 'href='
                                user_profile.php?u_id=$user_id'>$user_name</a>
                                </h3>
                                    
                                <h4><small style='color: black;'>Updated a 
                                post on <strong>$post_date</strong></small>
                                </h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-2'>
                            	<img src='$upload_image' width='320' height='213'>
                            </div>
                        </div><br>
                        <a href = 'edit_post.php?posts_id=$post_id' style='float: right;'><button class= 'btn btn-success'>Edit</button></a>
                        <a href='functions/delete_post.php?post_id=$post_id' style= 'float:right;'><button class='btn btn_danger'>Delete</button></a>
                    </div><br/><br/>
                ";
            }

                else if(strlen($content) >= 1 &&strlen($upload_image) >= 1){
                echo"

                <div id='own_posts'>
                    <div class='row'>
                         
                 
                         <div class='col-sm-4'></div>
                    </div>
                    <div class='row'>
                           <div class='col-sm-2'>
                           	<img src='$upload_image' width='320' height='213'>
                            </div>
                          <div class='col-sm-12'>
                                    <h3><p>$content</p></h3>
                                </div>
                    </div><br>
                        <a href = 'edit_post.php?posts_id=$post_id' style='float: right;'><button class= 'btn btn-success'>Edit</button></a>
                        <a href='functions/delete_post.php?post_id=$post_id' style= 'float:right;'><button class='btn btn_danger'>Delete</button></a>
                </div><br></br>
                ";
                }

                else{
                echo"  
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div id='uploaded_posts' class='col-sm-6'>
                            <div class='row'>
                                
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <h3><p>$content</p></h3>
                                </div>
                            </div><br>
                             <a href = 'edit_post.php?posts_id=$post_id' style='float: right;'><button class= 'btn btn-success'>Edit</button></a>
                             <a href='functions/delete_post.php?post_id=$post_id' style= 'float:right;'><button class='btn btn_danger'>Delete</button></a>
                        </div>
                        <div class='col-sm-3'>
                        </div>
                    </div><br><br>
                    ";
                    }
             }
   
        ?>  
    </div>



	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('profile.php?u_name=$user_name' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "$u_image.$random_number");
					$update = "update users set profile_picture='$u_image.$random_number' where username='$user_name'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('profile.php?u_name=$user_name' , '_self')</script>";
					}
				}

			}
	?>
	<div class="col-sm-2">
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-2" style="background-color: #e6e6e6;text-align: center;left: 0.9%;border-radius: 5px;">
		<?php
		echo"
			<center><h2><strong>About</strong></h2></center>
			<center><h4><strong>$user_name</strong></h4></center>
			<p><strong><i style='color:grey;'>$user_bio</i></strong></p><br>
		";
		?>
	</div>
</div>

<div class = "col-sm-8">
        <h1>Followers</h1>
        <?php
            global $con;

		$get_follower = "select * from connections where followeename='$user_name'";
	    $run_follower = mysqli_query($con, $get_follower);
         
				while($row_follow = mysqli_fetch_array($run_follower)){
                    $followername= $row_follow['followername'];
					echo"
					 <div class='row'>
	                    <div class='col-sm-12'>
	                        <h3><p>$followername</p></h3>
	                    </div>
                     </div><br>";
                 }


		?>
</div>

<div class = "col-sm-8">
        <h1>Following</h1>
        <?php
            global $con;

		$get_following = "select * from connections where followername='$user_name'";
	    $run_following = mysqli_query($con, $get_following);
         
				while($row_following = mysqli_fetch_array($run_following)){
                    $followeename= $row_following['followeename'];
					echo"
					 <div class='row'>
	                    <div class='col-sm-12'>
	                        <h3><p>$followeename</p></h3>
	                    </div>
                     </div><br>";
                 }


		?>
</div>


<div class = "col-sm-8">
        <h1>Subscribed Topics</h1>
        <?php
            global $con;

		$get_topic = "select * from tags where tagid IN (select tagid from subscribetags where username='$user_name')";
	    $run_topic = mysqli_query($con, $get_topic);
         
				while($row_topic = mysqli_fetch_array($run_topic)){
                    $topicname= $row_topic['topicname'];
                    $tagid= $row_topic['tagid'];
					echo"
					 <div class='row'>
	                    <div class='col-sm-12'>
	                        <h3><p>$topicname</p></h3>
	                        <a href='unsubscribe.php?tagid=$tagid' style='float:right;'><button class='btn btn-info'>unsubscribe</button></a><br>
	                    </div>
                     </div><br>";
                }


		?>
</div>

<div class = "col-sm-8">
        <h1>Subscribed Locations</h1>
        <?php
            global $con;

		$get_loc = "select * from location where locid IN (select locid from subscribeloc where username='$user_name')";
	    $run_loc = mysqli_query($con, $get_loc);
         
				while($row_loc = mysqli_fetch_array($run_loc)){
                    $countryname= $row_loc['countryName'];
                     $placename= $row_loc['PlaceName'];
                     $locid=$row_loc['locid'];
					echo"
					 <div class='row'>
	                    <div class='col-sm-12'>
	                        <h3><p>$countryname $placename</p></h3>
	                        <a href='unsubscribe.php?locid=$locid' style='float:right;'><button class='btn btn-info'>unsubscribe</button></a><br>
	                    </div>
                     </div><br>";
                }


		?>
</div>

</body>
</html>