<?php
require("/../classes/product.php");
session_start();
$prod = new Product;
$id = $_GET['id'];
$allProd = array();
$allProd = $prod->getstatus($id);
if($allProd['Status'] == '1'){
	$status = '0';
	$prod->changetoactive($status,$id);
} else if($allProd['Status'] == '0'){
    $status = '1';
	$prod->changetoactive($status,$id);
}
header('Location: allproducts.php?id='.$allProd['RestID'].'');
?>