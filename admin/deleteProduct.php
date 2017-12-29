<?php
require("/../classes/product.php");
session_start();
$id = $_GET['id'];
$prod = new Product($id);
$prod->DeleteProduct(); 
header('Location: allproducts.php?id='.$prod->RestID.'');
?>