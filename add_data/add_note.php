<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $post_date = file_get_contents("php://input");
  $data = json_decode($post_date);
  $note = $data->note;
  $tag  = $data->tag;

  $sql = "INSERT INTO notes (note,user_id,tag) VALUES('$note','$user_id','$tag')";
  if(($conn->query($sql))==true)
  {
    $sqll='SELECT * FROM notes WHERE id = (select MAX(id) from notes)';
    if(($result = $conn->query($sqll))== true)
    {
      $outp = "";
      while($row=$result->fetch_array()){
        $outp .= '{"id":"'.$row["id"].'",';
        $outp .= '"note":"'.$row["note"].'",';
        $outp .= '"tag":"'.$row["tag"].'",';
        $outp .= '"created_time":"'.$row["created_time"].'"}';
      }
      echo $outp;
    }
    else{
      echo $conn->error;
    }
  }
  else{
    echo "error";
  }
 ?>
