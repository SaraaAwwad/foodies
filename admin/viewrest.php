<?php
require_once("/../classes/restaurant.php");
require_once("/../classes/cuisine.php");
require_once("/../classes/areas.php");
session_start();
$rest = new Restaurant;
$allRest = array();
$allRest = $rest->getRestaurants();
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
<?php include("adminheader.php"); ?>

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
			  <th>Status</th>
</div>
        </tr>
        </thead>

        <tbody>
		<?php 
			for($i=0; $i<count($allRest); $i++){ ?>
            <tr id="row1">
            <td class="tdID"><strong><?php echo $allRest[$i]['ID'];?></strong></td>
			<td><img src="../css/images/<?php echo $allRest[$i]['Image'];?>" width="50" height="50"></td>
            <td><?php echo '<a class = "anchor" href="allproducts.php?id='.$allRest[$i]['ID'].'"> '.$allRest[$i]['Name'].'</a>';?></td>
			<td><?php echo $allRest[$i]['Hotline'];?></td>
			<td><?php echo $allRest[$i]['DelvFees'];?></td>
			<td><?php echo $allRest[$i]['DelvTime'];?></td>
			<?php for ($j=0; $j<count($rest->type[$i]); $j+=2){ ?>
			<td><span><?php echo $rest->type[$i][$j]; ?></span><br></td>
	        <?php } ?>
			<?php for ($j=0; $j<count($rest->Areas[$i]); $j+=2){ ?>
			<td><span><?php echo $rest->Areas[$i][$j]; ?></span><br></td>
	        <?php } ?>
	        <?php if($allRest[$i]['Status'] == '1' ){
	        echo '<td id="active"> Active </td>'; }
	        else if ($allRest[$i]['Status'] == '0'){
	        echo '<td id="inactive"> Inactive</td>';} ?>
			</tr>
		  <?php } ?>
        </tbody>
      </table>
        </div>    
		</div>
		</main>
		<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>

</html>