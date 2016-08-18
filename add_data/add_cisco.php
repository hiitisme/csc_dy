<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $name = $_POST['name'];
  $number = $_POST['cisco'];

  $sql = "INSERT INTO ciscos(user_id,name,number) VALUES('$user_id','$name','$number')";
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
