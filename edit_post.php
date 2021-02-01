<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
if (isset($_GET['posts_id'])) 
{
    $postid = $_GET['posts_id'];
}
echo" Please write your postid into the box for editing!
<br>
<br>
 YOUR POSTID: $postid";
?>
<div align ="center">
<b>Edit Your Post</b>
<br>
<br>


<form action = "edit_posts.php" method = "POST">
    <!-- <input type="text" name="sender" placeholder="From: "><br> -->
    <textarea class="form-control" id="content" rows="4" name="content" placeholder="Edit your text in here"></textarea><br>
    <textarea class="form-control" id="content" rows="4" name="postid" placeholder="Write your postid in here"></textarea><br>
<br>
<br> 
<br>
<br>   
<button id="btn-post" class="btn btn-success" name="sub">Edit Post</button>

</form>
</div>
</body>
</html>
