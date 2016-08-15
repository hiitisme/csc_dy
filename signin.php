<?php
session_start();
$short = $_POST['short'];
$password = $_POST['password'];
require('database.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM Profile where short_id ="'.$short.'"';
if(($result = $conn->query($sql))==true)
{
    while($row = $result->fetch_array())
    {
        if($row['password'] == $password)
        {
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['short'] = $row['short_id'];
          header('Location:index.php');
        }
        else {
          echo "Password Wrong";
        }
    }
  }
  else {
    echo "table select error";
  }

$conn->close();
 ?>
