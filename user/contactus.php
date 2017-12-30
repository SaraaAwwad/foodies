<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
	<link rel="stylesheet" type="text/css" href="..//css/style1.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
	<?php if (isset($_SESSION["userID"])){ 
echo'<header class="footerpage">
		<nav class="menu" id="navmenu">
			<ul>
				<li class="logo"> <a href= "userhome.php" class="log"> Foo<span class="org">d</span>ies </a></li>
			</ul>
		</nav>
	</header>';

		}else{

	echo'<header class="footerpage">
		<nav class="menu" id="navmenu">
			<ul>
				<li class="logo"> <a href= "../home.php" class="log"> Foo<span class="org">d</span>ies </a></li>
			</ul>
		</nav>
		</header>';

		}
	?>
<div class="board2">
	<h1>Contact Us</h1>
<br>
<br>
<b>Through E-mail</b>
<p>Send us an email if you're having trouble or feedback.</p>
<br>
<a href="mailto:foodies@gmail.com">foodies@gmail.com</a>


</div>
	

	





	
	<?php

	include("footer.php");
	
	?>
	<script type="text/javascript" src="js/SignUp.js"></script>
</body>
</html>