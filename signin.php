<?php
session_start();
$short = $_POST['short'];
$password = $_POST['password'];
require('database.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM profile where short_id ="'.$short.'"';
if(($result = $conn->query($sql))==true)
{
    while($row = $result->fetch_array())
    {
      if ($row['id']==""){
        echo '<div class="alert alert-danger" role="alert">You Are Not Registerd With US</div>';
      }
      elseif($row['password'] == $password)
        {
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['short'] = $row['short_id'];
          echo "success";
        }
        else {
          echo '<div class="alert alert-danger" role="alert">Wrong password</div>';
        }
    }
  }
  else {
    echo '<div class="alert alert-danger" role="alert">Sry Try Again</div>';
  }

$conn->close();
 ?>
