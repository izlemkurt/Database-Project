<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div align ="center">
<b>Send Your Messages</b>
<br>
<br>
<?php
include ("messages.php");
?>
<form action = "sendMsgs.php" method = "POST">
    <!-- <input type="text" name="sender" placeholder="From: "><br> -->
    <input type="text" name="receiver" placeholder="To: "><br>
    <textarea name="text" placeholder="Type your text here"></textarea><br>

    <button>Send!</button>
</form>
</div>
</body>
</html>