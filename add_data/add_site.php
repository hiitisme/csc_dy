<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $name = $_POST['name'];
  $site_url = $_POST['site_url'];

  $sql = "INSERT INTO sites(user_id,site,name) VALUES('$user_id','$site_url','$name')";
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
