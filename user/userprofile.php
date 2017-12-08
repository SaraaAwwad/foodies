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

<body>
	<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "userhome.html" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href="../home.html">Logout</a></li>
				<li><a href="userprofile.html" class="active">Profile</a></li>
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
				<li><a href="userprofile.html" class="sideactive">My Account</a></li>
				<li><a href="userprofile.html" class="sub subactive">Profile Information</a></li>
				<li><a href="usrchangepw.html" class="sub">Change Password</a></li>
				<li><a href="useractivity.html">View Activity</a></li>
				<li><a href="userhistory.html">View History</a></li>
			</ul>
		</div>
	</div>

	<div class="col-8">
	<div class="centview" id="cvId">
		<form name="formInfo" id="formIn" method="get" action="userprofile.html">
		<div class="error" id="err"></div>
		<div class="success" id="success"></div>
			<div class="card" id ="fCont">
				    <h4><b>First Name</b></h4> 
				    <p name="first" id= "fname" style="padding-left:10px; margin-bottom:0px;">Sara</p> 
				    <input type="hidden" name="firstName" id="ftext" required>
			</div>

				<div class="card" id="lCont">
				    <h4><b>Last Name</b></h4> 
				    <p name="last" id="lname" style="padding-left:10px; margin-bottom:0px;">Hassan</p> 
				    <input type="hidden" name="lastName" id="ltext" required>
				</div>

				<div class="card" id="aCont">
				    <h4><b>Address</b></h4> 
				    <p name="address" id="add" style="padding-left:10px; margin-bottom:0px;">Masr El-Gedida, Cairo, Egypt</p> 
				    <input type="hidden" name="addName" id="addtext" required>
				</div>

				<div class="card" id="nCont">
				    <h4><b>Phone Number</b></h4> 
				    <p name="phone" id="phonenum" style="padding-left:10px; margin-bottom:0px;">01091279903</p>
				    <input type="hidden" name="phoneName" id="numtext" required> 
				</div>		

		<button type="button" class="editbtn" id="edit" title="edit">Edit</button>
		<button type="submit" class="savebtn" id="saveBtn">Save</button>
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