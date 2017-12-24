<?php 
session_start();
$vari = "test"."3";

$_SESSION[$vari]="result";

echo $_SESSION["test3"];
?>