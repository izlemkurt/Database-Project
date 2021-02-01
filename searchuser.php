<!DOCTYPE html>
<?php
include ("config.php");
//include("header.php");
//include ("functions/functions.php");


?>
<html>

<body>
<div class="row">
</div>
<div class="row">
    <div class = "col-sm-12" > 
        <center><h2> Search Users </h2></center>
        <br>
        <br>

        <div class = "row">
            <div class = "col-sm-4">
                
            </div>
            <div class = "col-sm-4">
                <form class = "search_form" action="">
                    <input type="text" placeholder = "Search User" name="search_user">
                    <button class = "btn btn-info" type = "submit" name = "search_user_btn"> 
                    Search </button>
                </form>
            </div>
            <div class = "col-sm-4">
            </div>
        
        </div> <br> <br>
        <?php 
       
    if (isset($_GET['search_user_btn'])) {
        $search_query = htmlentities($_GET['search_user']);
        $get_user = "select * from users U where U.username = '$search_query'";
    }
    else
    {
        $get_user = "select * from users";

    }
    $run_user = mysqli_query($con, $get_user);
    while($row_user = mysqli_fetch_array($run_user)){
        $bio = $row_user['bio'];
        $passw = $row_user['passw'];
        $profile_picture = $row_user['profile_picture'];
        $username = $row_user['username'];
        $deactivate = $row_user['deactivate'];
        $followers = $row_user['followers'];
        
        
        echo"
        <div class='row'>
            <div class='col-sm-3'>
            </div>
            <div class='col-sm-6'>
                <div class='row' id = 'find_people'>
                    <div class='col-sm-4'>
                        <a href= 'adminsearch.php?u_id=$username'>
                        <img src = '$profile_picture' width = '150px' height = '140px' title = '$username' style= 'float:left'; ,margin:1px;'/>
                        </a>
                    </div><br><br>
                    <div class = 'col-sm--6'>
                        <a style = 'text-decoration:none;cursor:pointer;color:#3897f0;' href= 'adminsearch.php?u_id=$username'>
                        <strong><h2>$username</h2></strong> 
                        </a>
                    </div>
                       
                    <div class = 'col-sm-3'> 
                    </div>

                </div>
            </div>
            <div class='col-sm-4'> 
            </div>

        </div><br>";
    }
        ?>
    </div>
</div>
</body>
</html>

