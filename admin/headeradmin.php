<?php 
	echo'<script type="text/javascript" src="../js/header.js"></script>';
	if(!isset($_SESSION["adminID"])){
		echo'	<nav class="menu" id="navmenu">
					<ul>
					<li class="logo"> <a href= "../home.php" class="log"> Foo<span class="org">d</span>ies </a></li>
					</ul>
				</nav>';

		echo '<h1 style="padding-top: 120px;"> Sorry, You Can\'t View This Page Without Logging In!</h1>';

		echo 
			 '<div style="width:30%; margin: 0 auto; ">',
			 '<img src="../css/images/loginpls.png" alt="log in please" width="350" height="350">';
			 '</div>';

		exit();
	}else{
		echo'<nav class="menu" id="navmenu">
			<ul>
				<li class="logo"> <a href= "userhome.php" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href="../home.php">Logout</a></li>
				<li><a href="userprofile.php">Profile</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</nav>';
	}
?>