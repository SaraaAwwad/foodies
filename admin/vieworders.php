<?php

require_once("/../classes/orders.php");
require_once("/../classes/order_details.php");
session_start();

$allorders = array();
$allorders = Order::getOrders();


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


<div class="centview srch">
<input type="text" placeholder="Search for Restaurants Here.." id="searchrest">
</div>
<table id="otable" class="highlight">
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
			  <th>Product</th>
			  
			  
</tr>
        </thead>

        <tbody>
		 <?php 

			for($i=0; $i<count($allorders); $i++){ 
           	echo' <tr id="row1">';
           	echo ' <td class="tdID"><strong>'. $allorders[$i]->ID.'</strong></td>';
			echo'<td>'. $allorders[$i]->UserID.'</td>';
			echo'<td id="restname">'. $allorders[$i]->RestName.'</td>';
			echo'<td>'.$allorders[$i]->Area.'</td>';
			echo'<td>'.$allorders[$i]->Street.'</td>';
			echo'<td>'.$allorders[$i]->Building.'</td>';
			echo'<td>'.$allorders[$i]->DateOrder.'</td>';
			echo'<td>'.$allorders[$i]->TotalPrice.'</td>';

			$allItems = OrderDetails::getOrderItemById($allorders[$i]->ID);
						
						echo '<td>';
						for($j=0; $j<count($allItems); $j++){
							
							echo'x'.$allItems[$j]->Quantity.'  '.$allItems[$j]->ProdName.', with a price of: '.$allItems[$j]->Price.' each <br>';

							}
							echo '</td>';
			
			echo'</tr>';
		}
 ?>

		
        </tbody>
      </table>
        </div>    
		</div>
		</main>
		<script type="text/javascript" src="../js/AdminPage.js"></script>
		<script type="text/javascript" src="../js/ordersearch.js"></script>
</body>

</html>