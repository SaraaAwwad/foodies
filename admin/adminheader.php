<?php 
	echo'<script type="text/javascript" src="../js/header.js"></script>';
	if(!isset($_SESSION["adminID"])){
		echo'	<nav class="menu" id="navmenu">
					<ul>
					<li class="logo"> <a href= "../adminlogin.php" class="log"> Foo<span class="org">d</span>ies </a></li>
					</ul>
				</nav>';

		echo '<h1 style="padding-top: 120px; padding-left:450px; "> Sorry, You Have To Log In First!</h1>';

		echo 
			 '<div style="width:30%; margin: 0 auto; ">',
			 '<img src="../css/images/loginpls.png" alt="log in please" width="350" height="350">';
			 '</div>';

		exit();
	}else{
		echo'
		<header> 
		<nav class="menu" id="navmenu">
			<ul>
				<li class="logo"> <a href= "AdminPage.php" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href="adminlogout.php">Logout</a></li>
				<li><a href="profile.php">Profile</a></li>
			</ul>
		</nav>
		</header>';
	}

?>