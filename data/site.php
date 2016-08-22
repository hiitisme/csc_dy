<?php
require('../database.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$user_id = $_SESSION['user_id'];
$sql = 'select * from sites where user_id="'.$user_id.'"';

if(($result = $conn->query($sql))==true)
{
  $outp = "";
    while($row = $result->fetch_array())
    {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'.$row["id"].'",';
    $outp .= '"link":"'.$row["site"].'",';
    $outp .= '"name":"'.$row["name"].'"}';
}
}
$outp ='{"sites":['.$outp.']}';
$conn->close();

echo $outp;
?>
