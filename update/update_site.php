<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $name = $_POST['name'];
  $site_url = $_POST['site_url'];
  $site_id = $_PPOST['site_id'];
  $sql = 'UPDATE sites SET site="'.$site_url.'" name="'.$name.'" WHERE id="'.$site_id.'"';
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
