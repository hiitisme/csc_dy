<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $note_id = $_POST['note_id'];

  $sql = 'DELETE FROM notes WHERE id="'.$note_id.'" and user_id="'.$user_id.'"';
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
