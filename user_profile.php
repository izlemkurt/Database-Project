<!DOCTYPE html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
//session_start();
include("header.php");
include ("functions/functions.php");
include ("config.php");

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

?>
<html>
<head>
    
    <title>Find People</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
#own_posts{
    border: 5px solid #e6e6e6
    padding: 40px 50px;
    width: 90%;
}
#posts_img{
    height: 300px;
    width: 100%;
}
</style>
<body>
<div class="row">

    <?php
    $uname2=$_SESSION['name'];
    if(isset($_GET['u_id']))
    {
        $username = $_GET['u_id'];
    }
    if($username == "")
    {
        echo"<script>window.open('home.php','_self')</script>";
    }
    if ($username == $uname2){

        echo"<script>window.open('profile.php','_self')</script>";
    }
 //   else {
    ?>
    <div class="col-sm-12">

        <?php
            if(isset($_GET['u_id']))
            {
                global $con;

                //$username = $_GET['u_id'];

                $select = "select * from users where username ='$username'";
                $run = mysqli_query($con, $select);
                $row_user = mysqli_fetch_array($run);
               
                
                $bio = $row_user['bio'];
                $passw = $row_user['passw'];
                $profile_picture = $row_user['profile_picture'];
                //$user = $row_user['username'];
                $deactivate = $row_user['deactivate'];
                $followers = $row_user['followers'];
                
                $suspend="select * from manage_users where username='$username'";
                $run = mysqli_query($con, $suspend);
                $row_suspend = mysqli_fetch_array($run);
                
                $deadline = $row_suspend['deadline'];

                if ($deactivate=='0' && $deadline==' '){
                echo"
                    <div class='row'>
                        <div class='col-sm-1'>
                        </div>
                        <center>
                        <div style= 'background-color: #e6e6e6;' class='col-sm-3'>
                        <h2>Information about </h2>
                        <img class='img-circle' src = '$profile_picture' width='150' height='150'>
                        <br><br>
                        <ul class='list-group'>
                            <li class='list-group-item' title='Username'><strong>$username</strong></li>

                            <li class='list-group-item' title='Activate'><strong>Account is active</strong></li>
                            <li class='list-group-item' title='Bio'>Bio: <strong>$bio</strong></li>
                            <li class='list-group-item' title='Followers'>Followers: <strong>$followers</strong></li>
                             <a href='report_users.php?username=$username' style='float:right;'><button class='btn btn-info'>report</button></a><br>
                    
                        </ul>
                ";
                

                echo"
                    </div>
                    </center>
                ";
                }

                else if($deactivate=='1'){
                   echo"
                    <div class='row'>
                        <div class='col-sm-1'>
                        </div>
                        <center>
                        <div style= 'background-color: #e6e6e6;' class='col-sm-3'>
                        <h2>Information about </h2>
                        <img class='img-circle' src = '$profile_picture' width='150' height='150'>
                        <br><br>
                        <ul class='list-group'>
                            <li class='list-group-item' title='Username'><strong>$username</strong></li>

                            <li class='list-group-item' title='Activate'><strong>Account deactivated</strong></li>
                            <li class='list-group-item' title='Bio'>Bio: <strong>$bio</strong></li>
                            <li class='list-group-item' title='Followers'>Followers: <strong>$followers</strong></li>
                            <a href='report_users.php?username=$username' style='float:right;'><button class='btn btn-info'>report</button></a><br>
                    
                        </ul>
                ";
                

                echo"
                    </div>
                    </center>
                ";

                }

                else if($deadline != ' '){
                        echo"
                    <div class='row'>
                        <div class='col-sm-1'>
                        </div>
                        <center>
                        <div style= 'background-color: #e6e6e6;' class='col-sm-3'>
                        <h2>Information about </h2>
                        <img class='img-circle' src = '$profile_picture' width='150' height='150'>
                        <br><br>
                        <ul class='list-group'>
                            <li class='list-group-item' title='Username'><strong>$username</strong></li>

                            <li class='list-group-item' title='Activate'><strong>Account suspended</strong></li>
                            <li class='list-group-item' title='Bio'>Bio: <strong>$bio</strong></li>
                            <li class='list-group-item' title='Followers'>Followers: <strong>$followers</strong></li>
                             <a href='report_users.php?username=$username' style='float:right;'><button class='btn btn-info'>report</button></a><br>
                    
                        </ul>
                ";
                

                echo"
                    </div>
                    </center>
                ";

                }
           
            }
        ?>
        <div class = "col-sm-8">
        <center><h1><strong><?php echo "$username"; ?></strong> Posts</h1></center>
        <?php
            global $con;

            if(isset($_GET['u_id'])){
            $username = $_GET['u_id'];
            }

        $get_posts = "select * from uploaded_posts where username='$username' AND username NOT IN (select username from users where deactivate='1') AND postid NOT IN (select postid from manage_posts where hideident='1')";
       
        $run_posts = mysqli_query($con, $get_posts);

        while($row_posts = mysqli_fetch_array($run_posts)){

            $post_id = $row_posts['postid'];
            //$user_id = $row_posts['username'];
            $content = $row_posts['post_text'];
            $upload_image = $row_posts['image'];
            /*$uname= $_SESSION['name'];
            $user = "select *from users where username='uname' AND username IN(Select P.username from uploaded_posts P where P.username='$user_id')";*/
          
            if($content == "No" && strlen($upload_image) >= 1){

                echo" 
                    <div id='posts'>
                        <div class ='row'>
                    
                        </div>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <img src='$upload_image' width='320' height='213'>
                            </div>
                        </div><br>
                        <a href='report_posts.php?postid=$post_id' style='float:right;'><button class='btn btn-info'>report</button></a><br>
                    </div><br/><br/>
                ";
            }

                else if(strlen($content) >= 1 &&strlen($upload_image) >= 1){
                echo"

                <div id='posts'>
                    <div class='row'>

                         <div class='col-sm-4'></div>
                    </div>
                    <div class='row'>
                            <p>$content</p>
                        
                           <div class='col-sm-2'>
                            <img src='$upload_image' width='320' height='213'>
                            </div>
                    </div><br>
                            <a href='report_posts.php?postid=$post_id' style='float:right;'><button class='btn btn-info'>report</button></a><br>
                </div><br></br>
                ";
                }

                else{
                echo" 
                    <div id='posts'>
                        <div class='row'>
                           
                             <div class='col-sm-4'>                             
                             </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                            </div>
                        </div><br>

                       <a href='report_posts.php?postid=$post_id' style='float:right;'><button class='btn btn-info'>report</button></a><br>
                    </div><br><br>                           
                ";
                }
        }
        ?>

       
        
</div>
     
</body>
</html>
