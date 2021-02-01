<?php

session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'social_media';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(isset($_POST['city']))
{
    $usern= $_SESSION['name'];
    $city= $_POST['city'];
    $country= $_POST['country'];
    $query = "SELECT L.locid FROM location L WHERE countryName='$country' AND PlaceName='$city'";

    $result = mysqli_query($con, $query);
    $resultId = mysqli_fetch_assoc($result)["locid"];

//     $statement = $PDO->prepare($query);
// $params = array(
//     'name' => $_GET["username"]
// );
// $statement->execute($params);
// $user_data = $statement->fetch();

// $_SESSION['myid'] = $user_data['id'];

    $sql_statement = "INSERT INTO subscribeloc (username, locid) VALUES ('$usern', '$resultId')";
    // notice the single quote marks at the beginning and ending of php variables.



    if (mysqli_query($con, $sql_statement)) {
      header("Location: home.php?sub=success");
    } else {
      header("Location: home.php?sub=fail");
    }


    echo $usern . " ". $city ." ". $country ." ". $resultId ."<br>";

}
else
{
    echo "The form is not set.";
}

?>
