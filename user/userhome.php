<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link rel="stylesheet" type="text/css" href="../css/topnav.css">
	<link rel="stylesheet" type="text/css" href="../css/userstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro|Raleway" rel="stylesheet">
	<title>User-HomePage</title>	
</head>

<body>
	<header class="homepage">
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "userhome.html" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href="../home.html">Logout</a></li>
				<li><a href="userprofile.html">Profile</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</nav>
	</header>

	<div class="welcome">Find what's near you</div>

		<div class="searchBar">
	      	<select id="area">
	      		<option>Maadi</option>
	      		<option>Nasr City</option>
	      		<option>Heliopolis</option>
	      		<option>5th Settlement</option>
	      	</select>
		  
      	  	<button type="button" id="goButton">
      	  		GO!
      	  	</button>
    	</div>

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
	
	<main>
	</main>
<script>
	var btn = document.getElementById("goButton");
	btn.addEventListener("click", goBtn);

	function goBtn(){
		window.location.href="userrest.html";
	}
</script>
</body>
</html>