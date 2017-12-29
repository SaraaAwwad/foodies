<?php
require("/../classes/restaurant.php");
session_start();
$id = $_GET['id'];
$rest = new Restaurant($id);
$allRest = $rest->Status;
if($allRest == '1'){
	$status = '0';
	$rest->changetoactive($status);
} else if($allRest == '0'){
    $status = '1';
	$rest->changetoactive($status);
}
header("Location: addrestaurant.php");
?>