<?php
require('../database.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$user_id = $_SESSION['user_id'];
$site_id = $_POST['site_id'];
$sql = 'select * from sites where id="'.$site_id.'"';

if(($result = $conn->query($sql))==true)
{
  $outp = "";
    while($row = $result->fetch_array())
    {
      $outp .= '{"id":"'.$row["id"].'",';
      $outp .= '"link":"'.$row["site"].'",';
      $outp .= '"name":"'.$row["name"].'"}';
}
}
$conn->close();

echo $outp;
?>
