<?php
require("/../classes/product.php");
session_start();
$id = $_GET['id'];
$prod = new Product;
$allProd = array();
$allProd = $prod->getstatus($id);
$prod->DeleteProduct($id); 
header('Location: allproducts.php?id='.$allProd['RestID'].'');
?>