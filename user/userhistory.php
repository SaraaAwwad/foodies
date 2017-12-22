<?php
session_start();
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
				<h3 style="text-align: center;">You didn't make your first order, yet!<br>
				Here's to remind you how easy it is:</h3>
				<img src="../css/images/stepstani.gif" alt="steps" height=500 style="padding-left: 10%">
			</div>
		</div>
	</div>

		</main>	
<div class="row-gap"></div>
<?php include("footer.php") ?>

</body>
</html>