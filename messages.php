<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
</head>
<body>
    <div align="center"></div>

<table>

<tr><th> RECEIVER </th> <th> MESSAGE </th> </tr>

<?php

session_start();
include ("config.php");

//$db = mysqli_connect('localhost', 'root','','social media');
$usern= $_SESSION['name'];
$sql_statement = "SELECT * FROM messages where sender='$usern'"; 

$result = mysqli_query($con, $sql_statement);
//echo $result."message";
while($row = $result->fetch_assoc())
{
    //$mysender = $row['sender'];
    $myreceiver = $row['receiver'];
    $mytext = $row['message'];


    echo "<tr>"."<th>".$myreceiver."</th>"."<th>". $mytext."</th>"."</tr>";
    //echo $mysender . " ". $myreceiver ." ". $mytext . "<br>";

}

?>

</table>

</body>
</html>

