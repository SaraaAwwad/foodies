<?php
session_start();
require("../classes/user.php");
$user = new User;
$id=null;

 if(isset($_SESSION['userID'])){
 	$id=$_SESSION['userID'];
		$user->getInfo($id);
	}

	if (isset($_POST['savepsw'])){

		$old = $_POST["oldpw"];
		$new = $_POST["newpw"];

		if($user->updatePw($old, $new ,$id)){
			echo 'success';
		}else{
			echo 'fail';
		}
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
	
	<main>
	<div class="row-gap"></div>
	<div class="row">
		<div class="col-4">
			<div class="sidenav">
				<ul>
					<li><a href="userprofile.php" class="sideactive">My Account</a></li>
					<li><a href="userprofile.php" class="sub">Profile Information</a></li>
					<li><a href="usrchangepw.php" class="sub subactive">Change Password</a></li>
					<li><a href="useractivity.php">View Activity</a></li>
					<li><a href="userhistory.php">View History</a></li>
				</ul>
			</div>
		</div>
	
		<div class="col-8">
			<div class="centview">
				<div class="success" id="success"></div>
				<div class="error" id="err"></div>
				<form name="pwform" id="formPw" method="post" action="">
					<div class="card" id ="opwCont">
						    <h4><b>Enter Old Password:</b></h4> 
						    <input type="password" name="oldpw" id="oldpw" placeholder="old password here" required>
					</div>

						<div class="card" id="npwCont">
						    <h4><b>Enter New Password:</b></h4> 
						    <input type="password" name="newpw" id="newpw" placeholder="4 or more characters!" required>
						</div>

						<div class="card" id="aCont">
						    <h4><b>Re-enter New Password:</b></h4> 
						    <input type="password" name="rnewpw" id="rnewpw" placeholder="we're not looking.." required>
						</div>
			
					<button type="submit" class="sbtn" id="savepw" name="savepsw">Save</button>  
				</form>
			</div>
		</div>
	</div>
	</main>
	
<div class="row-gap"></div>
<?php include("footer.php") ?>
	
<script type="text/javascript" src="../js/changepw.js"></script>
</body>
</html>