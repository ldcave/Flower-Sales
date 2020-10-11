<?php 

session_start();
session_unset(); //taking values away
session_destroy(); //destroys session

header("Location: ../about.php");
exit();
?>