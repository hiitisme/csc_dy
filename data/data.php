<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$user_id = $_SESSION['user_id'];
$conn = new mysqli("mysql14.000webhost.com", "a6637786_pranav", "Hiitisme94", "a6637786_csc");

$sql = 'select * from ciscos where user_id="'.$user_id.'"';

if(($result = $conn->query($sql))==true)
{
  $outp = "";
    while($row = $result->fetch_array())
    {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"name":"'.$row["name"].'",';
    $outp .= '"no":"'.$row["number"].'"}';
}
}
$outp ='{"ciscos":['.$outp.']}';
$conn->close();

echo $outp;
?>
