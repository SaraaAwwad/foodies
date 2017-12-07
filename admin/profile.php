<!DOCTYPE html>
<html>
<head>
<title> Profile </title>
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
<link rel="stylesheet" type="text/css" href="../css/topnav.css">

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
<img class="bk2" src="../css/images/HS.jpg" alt="profile picture" >
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


  <!-- Header -->

  <div class="container" id="showcase">

    <h1 id="Profileh" >Profile</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Profile</li>
</ul>
    <hr class="round1">
	<img class="back4" src="../css/images/HS.jpg" alt="profile picture">
<img id="medias" src="../css/images/social.png" alt="social media">
	<div class="cards">
  <div class="cont1">
    <h4 id="cardsheader">First Name</h4> 
    <p>Farah </p> 
  </div>
</div>
<div class="cards">
  <div class="cont2">
    <h4 id="cardsheader">Last Name</h4> 
    <p>Hisham</p> 
  </div>
</div>
<div class="cards">
  <div class="cont3">
    <h4 id="cardsheader">Address</h4> 
    <p>Masr El-Gedida, Cairo, Egypt</p> 
  </div>
</div>
<div class="cards">
  <div class="cont4">
    <h4 id="cardsheader">Date of Birth</h4> 
    <p>7/11/1996</p> 
  </div>
</div>

  </div>
  </div>

</main>
<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>
</html>