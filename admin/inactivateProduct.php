<?php
require("/../classes/product.php");
session_start();
$id = $_GET['id'];
$prod = new Product($id);

$allProd = $prod->Status;
$rest = $prod->RestID;

if($allProd == '1'){
	$status = '0';
	$prod->changetoactive($status);
} else if($allProd == '0'){
    $status = '1';
	$prod->changetoactive($status);
}

header('Location: allproducts.php?id='.$rest.'');
?>