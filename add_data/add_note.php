<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $note = $_POST['note'];
  $tag  = $_POST['tag'];

  $sql = "INSERT INTO notes (note,user_id,tag) VALUES('$note','$user_id','$tag')";
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
