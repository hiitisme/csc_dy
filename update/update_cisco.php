<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $cisco_id = $_POST['cisco_id'];
  $name    = $_POST['name'];
  $number  = $_POST['cisco'];
  $mobile  = $_POST['mobile'];
  $short_id= $_POST['short_id'];
  $sql = "UPDATE ciscos SET name='$name' number='$number' mobile='$mobile' shortid='$short_id' WHERE id='$cisco_id'";
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
