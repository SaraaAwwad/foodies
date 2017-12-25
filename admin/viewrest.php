<?php
session_start();
require_once("/../classes/restaurant.php");
require_once("/../classes/cuisine.php");
require_once("/../classes/areas.php");
?>
<!DOCTYPE html>
<html>
<head>
<title> Add </title>
<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
<?php 
$rest = new Restaurant;
$qresult = $rest->getAllSelect();
$cuisine = new Cuisine;
$area = new Area;
?>
<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "AdminPage.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="log"> Foo<span class="org">d</span>ies </a></li>
        <li><a href="../adminlogin.php">Logout</a></li>
			</ul>
			</nav>
</header>
<h1 id="imagedesc">Viewing All Restaurants</h1>
<p id="descriptionheader"> Variety's the very spice of life, that gives it all it's flavour. </p>
 <div id="imageheader">
    <img src="../css/images/resta.jpg" />
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
  <li>Restaurants</li>
  <li>Manage</li>
</ul>
 </div>
 <table class="highlight">
        <thead>
          <tr>
              <th>ID</th>
			  <th>Logo</th>
        <th>Name</th>
			  <th>Hotline</th>
			  <th>Delivery Fees</th>
			  <th>Delivery Time</th>
			  <th>Cuisine</th>
			  <th>Areas</th>
</div>
        </tr>
        </thead>

        <tbody>
		<?php 
		if($qresult->num_rows>0){
		while($row = mysqli_fetch_array($qresult)){ ?>
          <tr>
          <td><?php echo $row['ID'];?></td>
			<td><img src="../css/images/<?php echo $row['Image'];?>" width="50" height="50"></td>
            <td><?php echo $row['Name'];?></td>
			<td><?php echo $row['Hotline'];?></td>
			<td><?php echo $row['DelvFees'];?></td>
			<td><?php echo $row['DelvTime'];?></td>
			<?php $result = $cuisine->getcuisine($row['ID']); ?>
			<td><?php echo $result['Type'];?></td>
			<td><?php $result2 = $area->getareaAll($row['ID']); 
			if($result2->num_rows>0){
		    while($row2 = mysqli_fetch_array($result2)){
			echo $row2['Area'];?><br>
			<?php }} ?></td>
          </tr>
		<?php }} ?>
        </tbody>
      </table>
        </div>    
		</div>
		</main>
		<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>

</html>