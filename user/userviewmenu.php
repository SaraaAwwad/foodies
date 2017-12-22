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

<body>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "userhome.php" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href="../home.php">Logout</a></li>
				<li><a href="userprofile.php">Profile</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</nav>

	<header class="menuhead">
		<h3 id="descheader">foodies offer a reliable service</h3>
	</header>
	
	<main>

	<div class="row">
		<div class="col-8">
			<div class="centview cent-prodc">
				<input type="text" placeholder="Search for Products Here.." id="searchInput">
				<table id="rTable">
					<tr>
						<td style="width: 80%;">
							<div>
								<img src="../css/images/chickenmac.png" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2>Chicken MACDO ® </h2>
								<p>Crispy, tender spicy chicken Pattie seasoned <br/>
								with a bold mix of spices,<br/>
							    topped with shredded iceberg lettuce,<br/>
								mayonnaise and served on a perfectly toasty bun</p>
							</div>
						</td>
						<td style="width:20%;">
							<button class="add-prd"></button>
							30.0 EGP
						</td>
					</tr>

					<tr>
						<td>
							<div>
								<img src="../css/images/friesmac.png" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2>McDonald's ® Fries - Regular</h2>
								<p>Regular size of the world famous fries; golden on the outside, soft and fluffy on the inside. Made with quality potatoes and cooked in our 100% vegetable oil (partially hydrogenated)</p>
							</div>
						</td>
						<td>
							<button class="add-prd"></button>
							15.0 EGP
						</td>
					</tr>

					<tr>
						<td>
							<div>
								<img src="../css/images/applemac.png" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2>Apple Pie</h2>
								<p>We're pretty sure this needs no introduction…because you two have met before, many times. But just in case you haven't…meet our humble Apple Pie. We know you two will be inseparable soon enough.</p>
							</div>
						</td>
						<td>
							<button class="add-prd"></button>
							12.50 EGP
						</td>
					</tr>
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
<?php include("footer.php") ?>
<script type="text/javascript" src="../js/usersearch.js"></script>
</body>
</html>