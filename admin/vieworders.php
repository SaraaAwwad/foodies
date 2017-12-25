<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Orders</title>
	<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
	<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "AdminPage.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="log"> Foo<span class="org">d</span>ies </a></li>
        <li><a href="../adminlogin.php">Logout</a></li>
			</ul>
			</nav>
	</header>
	<h1 id="imagedesc">Viewing All Orders</h1>
<!--<p id="descriptionheader"> Variety's the very spice of life, that gives it all it's flavour. </p>-->
 <div id="imageheader">
    <img src="../css/images/orders2.png" />
 </div>

 <main>
 	
 <div class="Bgimage">
<?php include("adminsidenav.php"); ?>
</div>

<div class="main2">
<div class="container" id="showcase">
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>View Orders</li>
</ul>
<table class="highlight">
        <thead>
          <tr>
              <th>ID</th>
			  <th>UserID</th>
        	  <th>Area</th>
			  <th>Street</th>
			  <th>Building</th>
			  <th>Date</th>
			  <th>Total Price</th>
			  
</div>

 </div>
 </main>
</body>
</html>