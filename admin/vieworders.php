<?php

require_once("/../classes/orders.php");
session_start();
$order = new Order;
$allorders = array();
$allorders = $order->getOrders();
$orders = new Order;

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Orders</title>
	<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
	<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php include("adminheader.php"); ?>

<h1 id="imagedesc">Viewing All Foodies Orders</h1>
<p id="descriptionheader"> Orders with Excellent Quality for Our Users. </p>
<div id="imageheader">
<img src="../css/images/smartphone.jpg" />
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
  <li>View Orders</li>
</ul>
<table class="highlight">
        <thead>
          <tr>
              <th>ID</th>
			  <th>UserID</th>
			  <th>Restaurant</th>
        	  <th>Area</th>
			  <th>Street</th>
			  <th>Building</th>
			  <th>Date</th>
			  <th>Total Price</th>
			  
</tr>
        </thead>

        <tbody>
		 <?php 

			for($i=0; $i<count($allorders); $i++){ 
           	echo' <tr id="row1">';
           	echo ' <td class="tdID"><strong>'. $allorders[$i]['ID'].'</strong></td>';
			echo'<td>'. $allorders[$i]['UserID'].'</td>';
			echo'<td><strong>'. $allorders[$i]['Name'].'</strong></td>';
			echo'<td>'.$allorders[$i]['Area'].'</td>';
			echo'<td>'.$allorders[$i]['Street'].'</td>';
			echo'<td>'.$allorders[$i]['Building'].'</td>';
			echo'<td>'.$allorders[$i]['DateOrder'].'</td>';
			echo'<td>'.$allorders[$i]['TotalPrice'].'</td>';

			echo'</tr>';
		}
 ?>

		
        </tbody>
      </table>
        </div>    
		</div>
		</main>
		<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>

</html>