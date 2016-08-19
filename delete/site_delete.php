<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $site_id = $_PPOST['site_id'];

  $sql = 'DELETE FROM sites WHERE id="'.$site_id.'" and user_id="'.$user_id.'"';
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
