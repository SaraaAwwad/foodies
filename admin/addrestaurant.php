<?php
require("/../classes/restaurant.php");
require("/../classes/cuisine.php");
require("/../classes/areas.php");
session_start();
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
<h1 id="imagedesc">Adding More Restaurants</h1>
<p id="descriptionheader"> Foodies offers a range of delicious food to their customers. </p>
<div id="imageheader">
<img src="../css/images/bread.jpg" />
</div>
 
<main>
<div class="Bgimage">
<div class="sidenav" id="mysidenav" >
<img class="bk2" src="../css/images/<?php echo ''.$_SESSION["adminImage"].'' ?> " alt="profile picture">
<hr id="sidenavhr"> 

<a href="profile.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-user-circle-o"></i> Profile</a>
<a href="teammembers.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-glass"></i> Restaurants</button>
<div class="panel" style="margin-bottom:0px" id ="paneltoggle" >
<a href="addrestaurant.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems PanelItem"><i class="	fa fa-user-plus"></i> Manage</a>
<a href="viewrest.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems PanelItem"><i class="fa fa-reorder"></i> View</a>
</div>
<a href="statistics.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-line-chart"></i> Statistics</a>
</div>


 
<div class="main2">
<div class="container" id="showcase">
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
    <li><a href="../admin/AdminPage.php">Admin</a></li>
    <li>Restaurants</li>
    <li>Manage</li>
</ul>
<button id="addrest"><i class="fa fa-plus"></i>Add Restaurant</button>
</div>
<table class="highlight" >
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
			  <th colspan="2"></th>
        </div>
        </tr>
        </thead>

        <tbody id="restaurantTable">
		<?php 
		if($qresult->num_rows>0){
		while($row = mysqli_fetch_array($qresult)){ ?>
            <tr id="row1">
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
			<td align="center"><?php echo '<a class = "butt" href="editForm.php?id='.$row['ID'].'">Update</a>'; ?></td>
            <td align="center"><?php echo '<a class = "butt" href="delete.php?id='.$row['ID'].'">Delete</a>'; ?></td>
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