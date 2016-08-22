<?php
require('../database.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$user_id = $_SESSION['user_id'];
$sql = 'select * from ciscos where user_id="'.$user_id.'"';

if(($result = $conn->query($sql))==true)
{
  $outp = "";
    while($row = $result->fetch_array())
    {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":"'.$row["id"].'",';
    $outp .= '"name":"'.$row["name"].'",';
    $outp .= '"no":"'.$row["number"].'",';
    $outp .= '"mobile":"'.$row["mobile"].'",';
    $outp .= '"short_id":"'.$row["shortid"].'"}';
}
}
$outp ='{"ciscos":['.$outp.']}';
$conn->close();

echo $outp;
?>
