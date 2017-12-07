<?php

// connect to the database
require('dbconnect.php');

$id = $_GET['id'];
$db_obj = new dbconnect;
$sql = "Delete FROM restaurant WHERE ID = $id";
$db_obj->executesql($sql); 

// redirect user after delete is successful
header("Location: addrestaurant.php");

?>