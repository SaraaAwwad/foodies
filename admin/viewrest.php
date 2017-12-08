<?php
include_once ("C:/wamp64/www/foodies/db/db_connect.php");
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
$db_obj = new dbconnect;
$sql = "SELECT ID, Name, Hotline, DelvFees, DelvTime, Image, AdminID FROM restaurant";
$qresult = $db_obj->selectsql($sql);
?>
<header>
		<nav class="menu">
			<ul>
        <li class="logo"> <a href= "AdminPage.php" class="log"> Foo<span class="org">d</span>ies </a></li>
        <li><a href="../adminlogin.php">Logout</a></li>
			</ul>
</header>
<h1 id="imagedesc">Viewing All Restaurants</h1>
<p id="descriptionheader"> Variety's the very spice of life, that gives it all it's flavour. </p>
 <div id="imageheader">
    <img src="../css/images/resta.jpg" />
 </div>
 
<main>
<div class="Bgimage">
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