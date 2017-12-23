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
					<li><a href="useractivity.php" class="sideactive">View Activity</a></li>
					<li><a href="useractivity.php" class="sub">View Reviews</a></li>
					<li><a href="useraddress.php" class="sub subactive">Address Book</a></li>
					<li><a href="userhistory.php">View History</a></li>
				</ul>
			</div>
		</div>

		<div class="col-8">
			<div class="centview">
				<h3 style="text-align: center;">We didn't deliver to you anywhere just yet.<br>
				Help us pamper you and order food now!</h3>
					<br>
				<img src="../css/images/addressnow.gif" style="padding-left:30%;">
			</div>
		</div>
	</div>
	</main>
	
<div class="row-gap"></div>
<?php include("footer.php") ?>
</body>