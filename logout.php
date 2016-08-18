
<?php
SESSION_START();
ob_start();
session_unset();
session_destroy();
header('Location:index.php');
?>
