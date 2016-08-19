<?php
require('../database.php');
$short_id = $_POST['short_id'];
$sql = 'select * from profile where short_id="'.$short_id.'"';

if(($result = $conn->query($sql))==true)
{
    while($row = $result->fetch_array())
    {
    if ($short_id == $row['short_id']) {
      echo "avail";
    }
}
}

$conn->close();
?>
