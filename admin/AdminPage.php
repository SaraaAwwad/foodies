<!DOCTYPE html>
<html>
<head>
<title> Admin Page </title>

<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>

<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "AdminPage.php" class="log"> Foo<span class="org">d</span>ies </a></li>
        		<li><a href="../adminlogin.html">Logout</a></li>
			</ul>
		</nav>
	</header>
<main>
<div class="sidenav" id="mysidenav" >
<img class="bk2" src="../css/images/HS.jpg" alt="profile picture">
<hr id="sidenavhr"> 

<a href="profile.php" class="sidenavitems item"><i class="fa fa-user-circle-o"></i> Profile</a>
<a href="teammembers.php" class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-glass"></i> Restaurants</button>
<div class="panel" style="margin-bottom:0px" id ="paneltoggle" >
  <a href="addrestaurant.php" class="sidenavitems PanelItem"><i class="	fa fa-user-plus"></i> Manage </a>
  <a href="viewrest.php" class="sidenavitems PanelItem"><i class="fa fa-reorder"></i> View </a>
</div>
  <a href="statistics.php" class="sidenavitems item"><i class="fa fa-line-chart"></i> Statistics</a>
</div>

<div class="main2">
<h1 style="text-align: center; font-size:40px; text-shadow: 2px 2px #ffcc00;"><b>Welcome Admin!</b></h1>
<h3 style="text-align: center; text-shadow: 2px 2px #c9c9c9">If you need me, I'll be in the refrigerator</h3> 
<div style="width:100%"><img class="background1" src="../css/images/ham.gif" align="middle"></div>
</div>
</main>
<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>

</html>