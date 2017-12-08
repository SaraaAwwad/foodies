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

<body>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "userhome.php" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href="../home.php">Logout</a></li>
				<li><a href="userprofile.php">Profile</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</nav>
	
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
						<img id="im1" src="../css/images/sidepizza.svg" alt="pizza" title="Pizza" width="70" height="100">
					</li>
					<li>
						<img id="im2" src="../css/images/sideburger.svg" alt="sandwich" title="Sandwiches" width="70" height="100">
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
					<h1>We Found (3) Restaurants That Deliver to Your Doorstep!</h1>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
			<div class="centview srch">
				<input type="text" placeholder="Search for Restaurants Here.." id="searchInput">

				<table id="rTable">
					<tr>
						<td>
							<div>
								<img src="../css/images/mac.png" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2><a href="userviewmenu.html">McDonald's</a></h2>
								<p>Sandwiches, Beverages, Desserts</p>
							</div>
						</td>
						<td>					
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<p>Delivers in 15 mins</p>
						</td>
					</tr>

					<tr>
						<td>
							<div>
								<img src="../css/images/pizzahut.png" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2><a href="#">Pizza Hut</a></h2>
								<p>Pizza, Pasta, Desserts</p>
							</div>
						</td>
						<td>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<p>Delivers in 30 mins</p>
						</td>
					</tr>

					<tr>
						<td>
							<div>
								<img src="../css/images/ddnts.png" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2><a href="#">Dunkin Donuts</a></h2>
								<p>Beverages, Desserts</p>
							</div>
						</td>
						<td>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<p>Delivers in 45 mins</p>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<div class="row-gap"></div>
	
	</main>

<script type="text/javascript" src="../js/usersearch.js"></script>
</body>
</html>