<?php 
session_start();
require_once("../classes/restaurant.php");

$allRest = array();
$place = -1;

if(isset($_GET['area'])){
	$place =$_GET['area'];

$allRest = Restaurant::getByArea($place);
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>User-Restaurants</title>	
</head>
<?php include("header.php"); ?>

<body onload="icoevent();">
	
	<header class="restheader">
		<h3 id="descheader">foodies offer a variety of restaurants</h3>
	</header>

	<main>
	
	<div class="row">
		<div class="col-4">
			<div class="sidenav sidecu">
				<ul id="searchImg">
					<li><a href="userrest.php" title="Click Here To Show All!">Search By Cuisine</a></li>
					<li>
						<img id="im0" src="../css/images/viewall1.png" alt="" title="View All" width="70" height="70">
					</li>
					<li>
						<img id="im1" src="../css/images/sidepizza.svg" alt="Pizza" title="Pizza" width="70" height="100">
					</li>
					<li>
						<img id="im2" src="../css/images/sideburger.svg" alt="Sandwiches" title="Sandwiches" width="70" height="100">
					</li>
					<li>
						<img id="im3" src="../css/images/sidesalad2.svg" alt="Salad" title="Salad" width="70" height="100">
					</li>
					<li>
						<img id="im4" src="../css/images/sidebev.svg" alt="Bev" title="Beverages" width="70" height="100">
					</li>
					<li>
						<img id="im5" src="../css/images/sidedessert.svg" alt="dessert" title="Desserts" width="70" height="100">
					</li>
				</ul>
			</div>
		</div>

	<div class="col-8">
		<div class="row">
			<div class="col-12">
				<div class="centview">
					<h1>We Found (<?php echo count($allRest); ?>) Restaurants That Deliver to Your Doorstep!</h1>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
			<div class="centview srch">
				<input type="text" placeholder="Search for Restaurants Here.." id="searchInput">

				<table id="rTable">
				<?php
					
					for($i=0; $i<count($allRest); $i++){
					echo'<tr>
						<td>
							<div>
								<img src="'.$allRest[$i]->Image.'" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2><a href="userviewmenu.php?Rest='.$allRest[$i]->ID.'&Area='.$place.'">'.$allRest[$i]->Name.'</a></h2>
								<p>'.implode(", ", $allRest[$i]->type[$i]).'</p>
							</div>
						</td>
						<td>';
							for($j=0; $j<$allRest[$i]->Rating;$j++){
								echo'<span class="fa fa-star checked"></span>';
							}
							for($j; $j<5; $j++){
							echo'<span class="fa fa-star"></span>';}

							echo'<p>Delivers in '.$allRest[$i]->DelvTime.'</p>
							<p><span class="fa fa-phone" aria-hidden="true"></span>'.$allRest[$i]->Hotline.'</p>
						</td>
					</tr>';
				 }?>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
	
</main>
<div class="row-gap"></div>
<?php include("footer.php") ?>

<script type="text/javascript" src="../js/usersearch.js"></script>
</body>
</html>