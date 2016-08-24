<?php
  require('../database.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $post_date = file_get_contents("php://input");
  $data = json_decode($post_date);
  $name    = $data->name;
  $number  = $data->number;
  $mobile  = $data->mobile_number;
  $short_id= $data->short_id;
  $sql = "INSERT INTO ciscos(user_id,name,number,mobile,shortid) VALUES('$user_id','$name','$number','$mobile','$short_id')";
  if(($conn->query($sql))==true)
  {
    $sqll='SELECT * FROM ciscos WHERE id = (select MAX(id) from ciscos)';
    if(($result = $conn->query($sqll))== true)
    {
      $outp = "";
      while($row=$result->fetch_array()){
        $outp .= '{"id":"'.$row["id"].'",';
        $outp .= '"name":"'.$row["name"].'",';
        $outp .= '"no":"'.$row["number"].'",';
        $outp .= '"mobile":"'.$row["mobile"].'",';
        $outp .= '"short_id":"'.$row["short_id"].'"}';
      }
      echo $outp;
    }
    else{
      echo $conn->error;
    }
  }
  else{
    echo $conn->error;
  }
 ?>
