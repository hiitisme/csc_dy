<?php
require('../database.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$user_id = $_SESSION['user_id'];
$cisco_id = $_POST['cisco_id'];
$sql = 'select * from ciscos where user_id="'.$user_id.'" and id="'.$cisco_id.'"';

if(($result = $conn->query($sql))==true)
{
  $outp = "";
    while($row = $result->fetch_array())
    {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"name":"'.$row["name"].'",';
    $outp .= '"no":"'.$row["number"].'",';
    $outp .= '"mobile":"'.$row["mobile"].'",';
    $outp .= '"short_id":"'.$row["short_id"].'"}';
}
}
$outp ='{"ciscos":['.$outp.']}';
$conn->close();

echo $outp;
?>
