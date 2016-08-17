<?php
session_start();
$name = $_POST['name'];
$short = $_POST['short_id'];
$password = $_POST['password'];
require('database.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO profile (NAME,SHORT_ID,PASSWORD) VALUES ('$name','$short','$password')";
if(($conn->query($sql))==true)
{
  echo '<div class="alert alert-success" role="alert">WELCOME!! NOW LOGIN</div>';
}
else
{
  echo '<div class="alert alert-danger" role="alert">OH!! sorry Try Again</div>';
}

$conn->close();
?>
