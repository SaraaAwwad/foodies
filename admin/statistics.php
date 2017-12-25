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
<?php include("adminsidenav.php"); ?>

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