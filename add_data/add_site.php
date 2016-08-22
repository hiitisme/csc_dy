<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $post_date = file_get_contents("php://input");
  $data = json_decode($post_date);
  $name = $data->name;
  $site_url = $data->site_url;

  $sql = "INSERT INTO sites(user_id,site,name) VALUES('$user_id','$site_url','$name')";
  if(($conn->query($sql))==true)
  {
    $sqll='SELECT * FROM sites WHERE id = (select MAX(id) from notes)';
    if(($result = $conn->query($sqll))== true)
    {
      $outp = "";
      while($row=$result->fetch_array()){
        $outp .= '{"id":"'.$row["id"].'",';
        $outp .= '"link":"'.$row["site"].'",';
        $outp .= '"name":"'.$row["name"].'"}';
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
