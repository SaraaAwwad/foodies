<?php 
session_start();

$ur = false;
$s=-1;

if(isset($_GET['Area']) && isset($_GET['Rest'])){
$area =$_GET['Area'];
$place =$_GET['Rest'];
$s = "shoppingcart".$place;
$ur = true;
}

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
	<title>User-Profile</title>	
</head>

<?php include("header.php"); ?>

<body>
	<div class="row-gap"></div>
	<div class="row">
		<div class="col-1">
			.
		</div>
		<div class="col-8">
			<div class="row">
				<div class="centview">
				<h1>Order Summary</h1>
				<hr>
				
				<?php 
				if (isset($_SESSION[$s]) && $ur){
					foreach($_SESSION[$s] as $keys => $values)  
                     {  

                          echo $values["product_quantity"].'x , '. $values["product_name"]. ' with price of:  '. $values["product_price"] .' each <br>';
                     }  
                     echo 'With a Total of: '. $_SESSION['total'];
				}else{
					echo 'No Order Found..';
				}
				?>
				</div>
			</div>
			<div class="row">
				<div class="centview">
					<h3>Enter Delivery Address <hr> </h3>
					<form method="post" action="orderdone.php?Rest=<?php echo $place ?>">
							<div class="col-4">
		      					<label><b>Area</b></label>
		      					<input type="text" style="width:90%;"  placeholder="Ex:Maadi,NasrCity,etc.." name="area" id="areaID" value ="<?php if($ur && isset($_SESSION[$s])){echo $area;} ?>" readonly>
		      				</div>

		      				<div class="col-4">	
		      					<label><b>Street Name</b></label>
		      					<input type="text" style="width:90%;" placeholder="Enter StreetName Here.. " name="street" id="streetID" required>
		      				</div>

		      				<div class="col-4">	
		      					<label><b>Building Number/Name</b></label>
		      					<input type="text" placeholder="Enter Building Here.." name="build" id="buildID" required>
		      				</div>

					<div class="col-12">
						<input type="submit" value="LET'S GO!" name="checkoutbtn" class="checkout">
					</div>
					</form>
				</div>
			</div>
		</div>

			<div class="col-3">
				<img src="../css/images/woho.gif" width="320">
			</div>
	</div>	

</body>

<div class="row-gap"></div>
<?php include("footer.php"); ?>
</html>
