<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $note = $_POST['note'];
  $tag  = $_POST['tag'];
  $note_id = $_POST['note_id'];
  $sql = 'UPDATE notes SET  note="'.$note.'" tag="'.$tag.'" WHERE id="'.$note_id.'" ';
  if(($conn->query($sql))==true)
  {
    echo "success";
  }
  else{
    echo "error";
  }
 ?>
