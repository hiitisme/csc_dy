<?php
require('../database.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$user_id = $_SESSION['user_id'];
$short_id = $_POST['short_id'];
$sql = 'select * from profile where short_id="'.$short_id.'"';

if(($result = $conn->query($sql))==true)
{
  $outp = "";
    while($row = $result->fetch_array())
    {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'.$row["id"].'",';
    $outp .= '"note":"'.$row["note"].'",';
    $outp .= '"tag":"'.$row["tag"].'",';
    $outp .= '"created_time":"'.$row["created_time"].'"}';
}
}
$outp ='{"notes":['.$outp.']}';
$conn->close();

echo $outp;
?>
