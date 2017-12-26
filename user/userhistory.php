<?php
session_start();
require_once("../classes/orders.php");
require_once("../classes/order_details.php");

$order = new Order;
$orderdetails= new OrderDetails;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/topnav.css">
	<link rel="stylesheet" type="text/css" href="../css/userstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>User-Profile</title>	

</head>
<?php include("header.php"); ?>
<body>
	
	<main>
	<div class="row-gap"></div>
	<div class="row">
		<div class="col-4">
			<div class="sidenav">
				<ul>
					<li><a href="userprofile.php">My Account</a></li>
					<li><a href="useractivity.php" >View Activity</a></li>
					<li><a href="userhistory.php" class="sideactive">View History</a></li>
				</ul>
			</div>
		</div>

		<div class="col-8">
			<div class="centview">
				<?php

				$allDates = $order->getHistoryDates($_SESSION["userID"]);
				if(!$allDates){
					echo'<h3 style="text-align: center;">You didn\'t make your first order, yet!<br>
				Here\'s to remind you how easy it is:</h3>
				<img src="../css/images/stepstani.gif" alt="steps" height=500 style="padding-left: 10%">';
				}else{
				for($i=0; $i<count($allDates); $i++){ 
					echo'<h2><img src="../css/images/history.png" width="35">'.$allDates[$i].'</h2><hr>'; 
					$allOrders = $order->getOrderByDate($allDates[$i],$_SESSION["userID"]);
					if($allOrders){
						echo '<h3 style="color:#ff99cc;"> You Made '.count($allOrders).' Order(s) </h3> ';
						
						echo '<ul class="history">';

						for($j=0; $j<count($allOrders); $j++){
							echo ' <li> <p><strong>
								From: '.$allOrders[$j]['RestName'].'</strong><br>
								<strong>Total Price (including taxes and delivery fees):'.$allOrders[$j]['TotalPrice'].' EGP</strong>
								<br><strong> Delivery Address: '.$allOrders[$j]['Building'].', '.$allOrders[$j]['Street'].', '.$allOrders[$j]['Area'].'</strong> </p> </li> <button class="showorder show" id="'.$allOrders[$j]['ID'].'">Show Order Details</button> <button style="display:none;" class="showorder hide" id="h_'.$allOrders[$j]['ID'].'">Hide Order Details</button> ';

							$allItems = $orderdetails->getOrderItemById($allOrders[$j]['ID']);
							echo'<p class="orderitems" style="display:none;" id="p'.$allOrders[$j]['ID'].'">';

							for($k=0; $k<count($allItems); $k++){
								echo 'x'.$allItems[$k]['Quantity'].'  '.$allItems[$k]['ProdName'].', with a price of: '.$allItems[$k]['Price'].' each <br>';
							}
							echo'</p><br><br>';
						}
						echo '</ul>';
					}
				} 
				
			}

				?>
			</div>
		</div>
	</div>

		</main>	
<div class="row-gap"></div>
<?php include("footer.php"); ?>

<script>
$(document).ready(function(data){
	$('.show').click(function(){
		var order_value = $(this).attr("id");
		$("#p"+order_value).show();
		$(this).hide();
		$("#h_"+order_value).show();
	});

	$('.hide').click(function(){
		var btnid = $(this).attr("id");
		$(this).hide();
		var temp = btnid.split("_");
		$("#p"+temp[1]).hide();
		$("#"+temp[1]).show();
	});
});
</script>
</body>
</html>