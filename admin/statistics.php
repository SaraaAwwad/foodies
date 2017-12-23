<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> Statistics</title>

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
        <li class="logo"> <a href= "AdminPage.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="log"> Foo<span class="org">d</span>ies </a></li>
        <li><a href="../adminlogin.php">Logout</a></li>
      </ul>
      </nav>
	</header>
<main>
<div class="sidenav" id="mysidenav" >
<img class="bk2" src="../css/images/<?php echo ''.$_SESSION["adminImage"].'' ?> " alt="profile picture">
<hr id="sidenavhr"> 

<a href="profile.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-user-circle-o"></i> Profile</a>
<a href="teammembers.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-glass"></i> Restaurants</button>
<div class="panel" style="margin-bottom:0px" id ="paneltoggle" >
<a href="addrestaurant.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems PanelItem"><i class="  fa fa-user-plus"></i> Manage</a>
<a href="viewrest.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems PanelItem"><i class="fa fa-reorder"></i> View</a>
</div>
<a href="statistics.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-line-chart"></i> Statistics</a>

</div>


<div class="main2">
  <!-- Header -->
  <div class="container" id="showcase">
    <h1 id="Profileh">Statistics for the Goodies!</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Statistics</li>
</ul>
 </div>
 
  <div class="chart">
  <div class="tick"><span>0</span></div>
  <div class="tick"><span>100</span></div>
  <div class="tick"><span>200</span></div>
  <div class="tick"><span>300</span></div>
  <div class="tick"><span>400</span></div>
  <div class="tick"><span>500</span></div>
  <div class="tick"><span>600</span></div>
  <div class="tick"><span>700</span></div>
  <div class="tick"><span>800</span></div>
  <div class="tick"><span>900</span></div>
</div>
  
</div>
</main>
<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>
</html>