<?php

session_start();
require_once("../classes/restaurant.php");
$added = false;
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

<?php include("header.php"); 
	
	if(isset($_GET["Rest"])){

		$place =$_GET['Rest'];

		$s = "shoppingcart".$place;
		$sdone = $s."done";
		if(isset($_SESSION[$s]) && isset($_SESSION[$sdone])) {
			unset($_SESSION[$s]);
			unset($_SESSION[$sdone]);
			unset($_SESSION["total"]);
			$added=true;
		}
	}
?>
<body>
	<div class="row-gap"></div>
	<div class="row">
		<div class="col-3">.</div>
		<div class="col-7">
			<div class="centview">
				<?php if($added){ 
					$rest = new Restaurant($place);
					$restname = $rest->Name; ?>
				<img src="../css/images/done.gif" style="margin-left:35%;">
				<h1>Order on the way!</h1>
				<h4 style="text-align:center;">Thank you for ordering from foodies! Your order is getting prepared and soon will be in your hands to enjoy. You will receive a confirmation email/SMS shortly.<br>
				
				<button class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> <a class="twitter-share-button"
					  href="https://twitter.com/intent/tweet?text=I%20just%20ordered%20from%20<?php echo $restname; ?>!;hashtags=foodies,yummy;via=foodies"
					  data-size="large" target="_blank">
					Tweet about it! </a></button>
					
				</h4>
				<?php } else{ ?>
				<img src="../css/images/taco-trip.gif" height="400" width="620">
				<h1>Sorry!</h1>
				<h4 style="text-align:center;">hmmm, looks there's something wrong with your order/ or you already submitted it. Please check your emails and sms, and contact us if this problem persists.</h4>
				<?php } ?>
			</div>
		</div>
	</div>

</body>

<div class="row-gap"></div>
<?php include("footer.php"); ?>

</html>