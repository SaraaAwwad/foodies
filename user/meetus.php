<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Meet the Team</title>
	<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
	<link rel="stylesheet" type="text/css" href="..//css/style1.css">
	
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
<header class="footerpage">
		<nav class="menu" id="navmenu">
			<ul>
				<li class="logo"> <a href= "home.php" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href=  "#" id ="logM">Log In</a></li>
				<li><a href = "#" id="createM">Create an Account</a></li>
				<li><a href = "#">Contact Us</a></li>
			</ul>
		</nav>
	</header>

	<div class="teamboard">
			
			<b>Meet the Team</b>
			<p>The team that worked hard to create this website</p>
			<div class="menna">
				<img src="../css/images/menna.jpg">
				<b>Menna Mohamed</b>
			</div>
			<div class="sara">
				<img src="../css/images/sara.jpeg">
				<b>Sara Hassan</b>
			</div>
			<div class="farrah">
				<img src="../css/images/farrah.png">
				<b>Farrah Hisham</b>
			</div>
			
		</div>





	
	<?php

	include("footer.php");
	
	?>
	<script type="text/javascript" src="js/SignUp.js"></script>
</body>
</html>