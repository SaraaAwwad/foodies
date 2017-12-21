<?php 
session_start();
require("../classes/user.php");

$user = new User;
$id = $_SESSION['userID'];
$user->getInfo($id);
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


<?php
	if (isset($_GET['saveInfo'])){

		$fn = test_input($_GET["firstName"]);
		$ln = test_input($_GET["lastName"]);
		$bld = test_input($_GET["buildName"]);
		$st = test_input($_GET["streetName"]);
		$ar = test_input($_GET["areaName"]);

		if($user->updateInfo($id, $fn, $ln, $bld, $st, $ar)){
			 echo'<script>$.notify("granted","success");</script>';
		}else{
			echo 'fail';
		}
	}

 	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
?>


	
<?php
	if(!isset($_SESSION["userID"])){
		echo '<h1> Sorry, You Can\'t View This Page Without Logging In!</h1>';
		exit();
	}
?>
<body>
	<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "userhome.php" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href="../home.php">Logout</a></li>
				<li><a href="userprofile.php" class="active"><?php echo $user->FirstName;?></a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</nav>
	</header>

	<main>
<div class="row-gap"></div>
<div class="row">
	<div class="col-4">
		<div class="sidenav">
			<ul>
				<li><a href="userprofile.php" class="sideactive">My Account</a></li>
				<li><a href="userprofile.php" class="sub subactive">Profile Information</a></li>
				<li><a href="usrchangepw.php" class="sub">Change Password</a></li>
				<li><a href="useractivity.php">View Activity</a></li>
				<li><a href="userhistory.php">View History</a></li>
			</ul>
		</div>
	</div>

	<div class="col-8">
	<div class="centview" id="cvId">
		<form name="formInfo" id="formIn" method="get" action="">
		<div class="error" id="err"></div>
		<div class="success" id="success"></div>
			<div class="card" id ="fCont">
				    <h4><b>First Name</b></h4> 
				    <p name="first" id= "fname" style="padding-left:30px; margin-bottom:0px;"><?php echo $user->FirstName; ?></p> 
				    <input type="hidden" name="firstName" id="ftext" required>
			</div>

				<div class="card" id="lCont">
				    <h4><b>Last Name</b></h4> 
				    <p name="last" id="lname" style="padding-left:30px; margin-bottom:0px;"><?php echo $user->LastName; ?></p> 
				    <input type="hidden" name="lastName" id="ltext" required>
				</div>

				<div class="card" id="aCont">
				    <h4><b>Address</b></h4> 
				    <span name ="addBuilding" id ="build" style="padding-left:30px; margin-bottom:0px;"><?php echo $user->Building; ?></span>
				    <span name ="addStreet" id ="street" style="padding-left:10px;"><?php echo $user->Street; ?></span>
				    <span name="addArea" id="areaUser" style="padding-left:10px;"><?php echo $user->Area;?></span> 
				    
				    
				    <div class="row">
				    	<div class="col-4">
				    		<input type="hidden" name="buildName" id="buildtext" required>
				    	</div>
				    	<div class="col-4">
				    		<input type="hidden" name="streetName" id="streettext" required>
				    	</div>
				    	<div class="col-4">
				    		<input type="hidden" name="areaName" id="areatext" required>
				    	</div>				   
				    </div> 
				</div>

				<div class="card" id="nCont">
				    <h4><b>Phone Number</b></h4> 
				    <p name="phone" id="phonenum" style="padding-left:30px; margin-bottom:0px;">01091279903</p>
				    <input type="hidden" name="phoneName" id="numtext" required>
				    
				</div>		

		<button type="button" class="editbtn" id="edit" title="edit">Edit</button>
		<button type="submit" class="savebtn" id="saveBtn" name="saveInfo">Save</button>
		</form>  
  	</div>
  </div>
</div>
<div class="row-gap"></div>
<div class="row">
		<div class="col-12">
		<footer>
		<div class="footerCol">
			<b id="head">Restaurants</b>
			<p>Domino's Pizza</p>
			<p>Shabrawy</p>
			<p>McDonald's</p>
			<p>Pizza Hut</p>
			<p>Khayrat El Sham</p>
		</div>
	
		<div class="footerCol">
		<b id="head">Popular Cuisines</b>
			<p>Pizza</p>
			<p>Burger</p>
			<p>Shawerma</p>
			<p>Feteer</p>
			<p>Sushi</p>
		</div>
	
		<div class="footerCol">
			<b id="head">Foodies</b>
			<p>About Us</p>
			<p>Contact Us</p>
			<p>Meet the Team</p>
		</div>
	</footer>
	</div>
	</div>

</main>

<script type="text/javascript" src="../js/edituserinfo.js"></script>
</body>
</html>