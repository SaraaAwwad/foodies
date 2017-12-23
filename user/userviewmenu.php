<?php
session_start();
require_once("../classes/product.php");
$prod = new Product;

$allProd = array();

if(isset($_GET['Rest'])){
	$place =$_GET['Rest'];

$allProd = $prod->getProduct($place);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/topnav.css">
	<link rel="stylesheet" type="text/css" href="../css/userstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
	<title>User-Menu</title>	
</head>

<?php include("header.php"); ?>

<body>
	
	<header class="menuhead">
		<h3 id="descheader">foodies offer a reliable service</h3>
	</header>
	
	<main>

	<div class="row">
		<div class="col-8">
			<div class="centview cent-prodc">
				<input type="text" placeholder="Search for Products Here.." id="searchInput">
				<table id="rTable">
					<?php 
					for($i=0; $i<count($allProd); $i++){
					echo'<tr>
						<td style="width: 70%;">
							<div>
								<img src="../css/images/'.$allProd[$i]['Image'].'" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2>'.$allProd[$i]['Name'].'</h2>
								<p>'.$allProd[$i]['Description'].'</p>
							</div>
						</td>
						<td style="width:30%;">';

						for ($j=0; $j<count($prod->values[$i]); $j+=2){
							echo'<button class="add-prd"></button>
							 <span>'.$prod->values[$i][$j].'</span> EGP -
							<span>'.$prod->values[$i][$j+1].'</span> <hr>'
							;}
						echo'</td>
						</tr>';
						}
					?>
				</table>
			</div>
		</div>
	
		<div class="col-4">
			<div class="container-shop">
				<div class="shop-cart">
					<h3>Add to Your Plate</h3>
					<hr>
					Your current plate is empty.
					<br>
					<img src="../css/images/plate.png" alt="plate" width="170" height="170">
				</div>
				Delivery fees: 10.0 EGP<br>
				Estimated Time: 15 Mins
			</div>
		</div>
	</div>
	</main>

<div class="row-gap"></div>
<div class="row-gap"></div>

<?php include("footer.php") ?>
<script type="text/javascript" src="../js/usersearch.js"></script>
</body>
</html>