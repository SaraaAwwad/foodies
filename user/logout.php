<?php 
session_start();

session_unset();
// Finally, destroy the session.
session_destroy();

//session_destroy();

header("location:../home.php");
exit(); 
?>