<?php
include ("config.php");
session_start();


 $username = $_SESSION['name'];
if($_SERVER['REQUEST_METHOD']== "POST")
{
  //  session_start();

    if (isset($_POST['content'])) {

  //  $postid = rand(29000,100000);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $topic  = $_POST['top'];
   // $img  = $_POST['image'];
    $content  = $_POST['content'];
    
    $foo = True;

if(empty($_POST['country']) || empty($_POST['city']) || empty($_POST['top'])|| empty($_POST['content']))
 {
    echo "<script>alert('You have an empty field.');</script>";

     echo"<script>location.assign('home.php')</script>";  // go back to the login page
     $foo = False;
 
 }
 if($foo == True){
    $sql_statement2 = "INSERT INTO location(countryName, PlaceName)
                      VALUES ('$country', '$city')";
    $sql_statement3 = "INSERT INTO tags(topicname)
                      VALUES ('$topic')";

    //echo "Hi " . $username;
    $result2 = mysqli_query($con, $sql_statement2);
        $result3 = mysqli_query($con, $sql_statement3);
        echo $result3;

    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "" )
    {
      echo $_FILES['image']['name'];

      $t = time();
      $timestamp = date("Y-m-d-h-m-s",$t);

      $target_dir = "images/";
      $target_file = $target_dir .$username."-".$timestamp."-". basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
          //echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          //echo "File is not an image.";
          $uploadOk = 0;
      }

      if (file_exists($target_file)) {
          //echo "Sorry, file already exists.";
          $uploadOk = 0;
      }


          //echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

      //$filename =  "images/".$_FILES['image']['name'];
      //move_uploaded_file($_FILES['image']['tmp_name'],  $filename);
      if(file_exists($target_file))
      {

        $sql_statement = "INSERT INTO uploaded_posts(post_text, image, username)
                      VALUES ('$content', '$target_file', '$username')";


    //echo $sql_statement;
    $result = mysqli_query($con, $sql_statement);

    //echo $sql_statement2. " ". $result2;



      }


      }
    }
    }



}
?>
