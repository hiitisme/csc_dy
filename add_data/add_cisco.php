<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $name    = $_POST['name'];
  $number  = $_POST['cisco'];
  $mobile  = $_POST['mobile'];
  $short_id= $_POST['short_id'];
  $sql = "INSERT INTO ciscos(user_id,name,number,mobile,shortid) VALUES('$user_id','$name','$number','$mobile','$short_id')";
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
