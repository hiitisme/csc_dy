<?php
session_start();
$short = $_POST['short'];
$password = $_POST['password'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Profile where shortid ='".$short."'";
$result = $conn->query($sql);
    while($row = $result->fetch_assoc())
    {
        if($row["password"] == $password)
        {
          $_SESSION["name"] = $row["name"];
          $_SESSION["short"] = $row["shortid"];
          header('Location:index.php');
        }
        else {
          echo "Something Wrong";
        }
    }

$conn->close();
 ?>
