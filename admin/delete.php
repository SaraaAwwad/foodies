<?php
require("/../classes/restaurant.php");
session_start();
$rest = new Restaurant;
$id = $_GET['id'];
$rest->DeleteRest($id); 
header("Location: addrestaurant.php");
?>