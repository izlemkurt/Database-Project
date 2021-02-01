<!DOCTYPE html>
<?php
include ("config.php");


?>
<html>

<body>
<div class="row">
</div>
<div class="row">
    <div class = "col-sm-12" > 
        <center><h2> Reported Posts and Users </h2></center>
        <br>
        <br>
<div class = "col-sm-8">
    <h1>Reported users</h1>
        <?php 
       
   
    $get_user = "select * from users where username IN (select username from reported_users)";

    $run_user = mysqli_query($con, $get_user);
    while($row_user = mysqli_fetch_array($run_user)){
       
        $profile_picture = $row_user['profile_picture'];
        $username = $row_user['username'];
        
        
        echo"
        <div class='row'>
            <div class='col-sm-3'>
            </div>
            <div class='col-sm-6'>
                <div class='row' id = 'find_people'>
                    <div class='col-sm-4'>
                        <img src = '$profile_picture' width = '150px' height = '140px' title = '$username' style= 'float:left'; ,margin:1px;'/>
                   
                    </div><br><br>
                    <div class = 'col-sm--6'>
                        <strong><h2>$username</h2></strong> 
                  
                    </div>
                

                </div>
            </div>
            <div class='col-sm-4'> 
            </div>

        </div><br>";
    }
        ?>
    </div>

<div class = "col-sm-8">
    <h1>Reported posts</h1>
    <?php 
      
    $get_post = "select * from uploaded_posts where postid IN (select postid from report_posts)";

    $run_post = mysqli_query($con, $get_post);
    while($row_post = mysqli_fetch_array($run_post)){
            $post_id = $row_post['postid'];
            $user_id = $row_post['username'];
            $content = $row_post['post_text'];
            $upload_image = $row_post['image'];
            /*$uname= $_SESSION['name'];
            $user = "select *from users where username='uname' AND username IN(Select P.username from uploaded_posts P where P.username='$user_id')";*/
          
            if($content == "No" && strlen($upload_image) >= 1){

                echo" 
                    <div id='posts'>
                        <div class ='row'>
                    
                        </div>
                        <div class='row'>
                        <br>$post_id<br>
                        <br>$user_id<br>
                            <div class='col-sm-2'>
                            <img id='posts-img' src='$upload_image' width='250px' height='300px'>
                            </div>
                        </div><br>
                        
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
                    <br>$user_id<br>
                    <br>$post_id<br>
                            <p>$content</p>
                        
                           <div class='col-sm-2'>
                            <img id='posts-img' src='$upload_image' width='250px' height='300px'>
                            </div>
                    </div><br>

                </div><br></br>
                ";
                }

                else{
                echo" 
                    <div id='posts'>
                        <div class='row'>
                           <br>$user_id<br>
                           <br>$post_id<br>
                             <div class='col-sm-4'>                             
                             </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                            </div>
                        </div><br>
                       
                    </div><br><br>                           
                ";
                }
        
    
    }
        ?>
    </div>

    </div>
</div>
</body>
</html>