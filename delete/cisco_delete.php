<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $cisco_id = $_POST['cisco_id'];
  $sql = 'DELETE FROM ciscos WHERE id="'.$cisco_id.'" and user_id="'.$user_id.'"';
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
