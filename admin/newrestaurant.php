<?php 
require_once('dbconnect.php');


	$db_obj = new dbconnect;
?>

<!DOCTYPE html>
<html>
<head>
<title> Add </title>
<link rel="stylesheet" type="text/css" href="../css/topnav.css">
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body style="background-color: #f0f5f5;">
<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "../home.htmls" class="log"> Foo<span class="org">d</span>ies </a></li>
				
			</ul>
			</nav>
</header>

<div class="sidenav" id="mysidenav" >
<a id="profilelink" href= "../admin/AdminPage.html">
<img class="bk2" src="../css/images/HS.jpg" alt="profile picture">
</a>
<hr id="sidenavhr"> 

<a href="profile.html" class="sidenavitems item"><i class="fa fa-user-circle-o"></i> Profile</a>
<a href="teammembers.html" class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-glass"></i> Restaurants</button>
<div class="panel" style="margin-bottom:0px" id ="paneltoggle" >
  <a href="addrestaurant.html" class="sidenavitems PanelItem"><i class="	fa fa-user-plus"></i> Manage </a>
 <a href="viewrest.html" class="sidenavitems PanelItem"><i class="fa fa-reorder"></i> View </a>
</div>
<a href="statistics.html" class="sidenavitems item"><i class="fa fa-line-chart"></i> Statistics</a>
</div>

<script type="text/javascript" src="js/AdminPage.js"></script>

<div class="main2" >
<div class="container" id="showcase">
    <h1 id="con">New Restaurant</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.html">Admin</a></li>
  <li>Restaurants</li>
  <li>Manage</li>
  <li>New Restaurant</li>
</ul>

<form name="restForm" action="Add.php" method="POST">

	<b id="greenField">Name</b>
	<br>
	<input type="text" name="Name" id="restarea" required >
	<br>

<b id="greenField">Cuisine</b>
<br>
<input type="text" name="Type" id="restarea" required >
<br>

	<b id="greenField">Delivery Area</b>
	<br>

<select name="Area" id="restarea" required>

<?php
    $_Area = $db_obj->SelectAll('areas');
    $Count = count($_Area);
  	echo'<option value="">-----------------</option>';
    for ($i = 0; $i < $Count; $i++) {
                                                    
        echo  "<option  value='".$_Area[$i]['ID']."'>".$_Area[$i]['Area']."</option>";
    }
    ?>
</select>
	<br>

<b class="addNewRest">Hotline</b>
<br>
<input type="text" name="Hotline" id="restarea" required>
<br>

	<b class="addNewRest">Delivery Fees</b>
	<br>
	<input type="text" name="DelvFees" id="restarea" required>
	<br>

<b class="addNewRest">Delivery Time</b>
<br>
<input type="text" name="DelvTime" id="restarea" required>
<br>

	<b class="addNewRest">Image</b>
	<br>
	<input type="text" name="Image" id="restarea" required>
	<br>

<b class="addNewRest">Admin ID</b>
<br>
<select name="AdminID" id="restarea" required>
	<?php
    $_Area = $db_obj->SelectAll('admin');
    $Count = count($_Area);
  	echo'<option value="">-----------------</option>';
    for ($i = 0; $i < $Count; $i++) {
                                                    
        echo  "<option  value='".$_Area[$i]['ID']."'>".$_Area[$i]['Email']."</option>";
    }
    ?>
</select>
<br>

<button type="submit" name="saver" id="saverest">Add</button>

<button type="submit" id="cancelrest">Cancel</button>

</form>

 </div>

 
        </div>    
		
		<script type="text/javascript" src="../js/AdminPage.js"></script>
		<script type="text/javascript" src="js/newrestaurant.js"></script>
</body>

</html>
