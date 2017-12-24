<?php
require("/../classes/restaurant.php");
session_start();
$rest = new Restaurant;
$id = $_GET['id'];
$allRest = array();
$allRest = $rest->getstatus($id);
if($allRest['Status'] == '1'){
	$status = '0';
	$rest->changetoactive($status,$id);
} else if($allRest['Status'] == '0'){
    $status = '1';
	$rest->changetoactive($status,$id);
}
header("Location: addrestaurant.php");
?>