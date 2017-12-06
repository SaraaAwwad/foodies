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
<body>
<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "AdminPage.php" class="log"> Foo<span class="org">d</span>ies </a></li>
        <li><a href="../adminlogin.html">Logout</a></li>
			</ul>
</header>
<h1 id="imagedesc">Adding More Restaurants</h1>
<p id="descriptionheader"> Foodies offers a range of delicious food to their customers. </p>
 <div id="imageheader">
    <img src="../css/images/bread.jpg" />
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
<button id="addrest"><i class="fa fa-plus"></i>Add Restaurant</button>
 </div>
 <table class="highlight" >
        <thead>
          <tr>
              <th>Restaurant Name</th>
              <th>City</th>
              <th>Zip Code</th>
			  <th>Address</th>
</div>
          </tr>
        </thead>

        <tbody id="restaurantTable">
          <tr id="row1">
            <td contenteditable='true'>Crave</td>
            <td contenteditable='true'>Cairo</td>
            <td contenteditable='true'>12345</td>
			<td contenteditable='true'>21 ,Nasr City</td>
			<td ><button type="button" id="editbutton1"><i class="fa fa-edit"></i>Edit</td>
			<td ><button type="button" id="deletebutton1"><i class="fa fa-trash"></i>Delete</td>


          </tr>
          <tr id="row2">
            <td contenteditable='true'>Ted's</td>
            <td contenteditable='true'>Alexandria</td>
            <td contenteditable='true'>28747</td>
			<td contenteditable='true'>18 ,Masr El-Gedida</td>
			<td ><button type="button" id="editbutton2"><i class="fa fa-edit"></i>Edit</td>
			<td ><button type="button" id="deletebutton2"><i class="fa fa-trash"></i>Delete</td>
          </tr>
          <tr id="row3">
            <td contenteditable='true'>Espresso Lab</td>
            <td contenteditable='true'>Cairo</td>
            <td contenteditable='true'>23564</td>
			<td contenteditable='true'>112 ,Maadi</td>
			<td ><button type="button" id="editbutton3"><i class="fa fa-edit"></i>Edit</td>
			<td ><button type="button" id="deletebutton3"><i class="fa fa-trash"></i>Delete</td>
          </tr>
        </tbody>
      </table>
        </div>    
		</div>
		</main>
		<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>

</html>