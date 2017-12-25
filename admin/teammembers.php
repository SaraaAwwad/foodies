<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> Team Page </title>

<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">

</head>
<body>

<?php include("adminheader.php"); ?>
	
<main>
<?php include("adminsidenav.php"); ?>
<div class="main3">


  <!-- Header -->

  <div class="container" id="showcase">

    <h1 id="teamh">Foodies Admins</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Team Members</li>
</ul>
  </div>
  <hr class="round1">
<div class="cardteam cardteam-1">
            <div class="card-image">
              <img class="plate" src="../css/images/character4.png" align="middle">
              <b id="names">Farah Hisham</b>
            </div>
              <p class="resturantdesc"> Develops site content and graphics by coordinating with copywriters and graphic artists; designing images, icons, banners. </p>
          </div>
		  
		  <div class="cardteam cardteam-1">
            <div class="card-image">
              <img class="plate" src="../css/images/character7.png" align="middle">
              <b id="names">Sara Hassan</b>
            </div>
              <p class="resturantdesc"> A website coordinator works as an administrator to a company's websites and maintaining Web design. </p>
          </div>
		  
		  <div class="cardteam cardteam-1">
            <div class="card-image">
              <img class="plate" src="../css/images/character6.png" align="middle">
              <b id="names">Menna Mohamed</b>
            </div>
              <p class="resturantdesc"> Upgrades site by updating content and graphics; monitoring performance; identifying and evaluating improvement options. </p>
          </div>
  
  </div>
  
</main>
<script type="text/javascript" src="../js/AdminPage.js"></script>

</body>

</html>