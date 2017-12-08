<?php 
session_start();
require("classes/user.php");
?>
<?php
	
	$user = new User;

		if (isset($_POST['signupbtn'])){

			$em = test_input($_POST["email"]);
			$psw = test_input($_POST["psw"]);
			$fn = test_input($_POST["fnameSU"]);
			$ln = test_input($_POST["lnameSU"]);
			$ar = test_input($_POST["areaSU"]);
			$st = test_input($_POST["streetSU"]);
			$bld = test_input($_POST["buildSU"]);
			$rep = test_input($_POST["psw-repeat"]);

			$storePw = password_hash($psw, PASSWORD_BCRYPT, array('cost'=>8));

				if($user->isExist($em)){
					?>	
						<div id="signUp" class="modal" style="display: block;">
	  				<form class="modal-form" name="frmSU" id="formSu" method="post" action="">
	   				<span class="close" title="Close Modal" id="closeM">×</span>
	   				<fieldset>
	   					<legend align="center">
	   						<img class="img-circle" alt="user" src="css/images/homer3.jpg"><br>
	   					</legend>
	   					<div style="color:red">This Email is already registered!</div>

	   					<div id="error"></div>
	     				<label><b>Email</b></label>
	       				<input type="text" id="em" name="email" value=" " required>

	      				<label><b>Password</b></label>
	      				<input type="password" value =<?php echo $psw;?> name="psw" id="pw" required>

	      				<label><b>Re-Enter Password</b></label>
	      				<input type="password" value=<?php echo $rep;?> name="psw-repeat" id="rpw" required>

	      			<div class="row">
	      				<div class="col-6">
	      				<label><b>First Name</b></label>
	      				<input type="text" style="width:90%;"  value=<?php echo $fn;?> name="fnameSU" id="fnID" required>
	      				</div>

	      				<div class="col-6">	
	      				<label><b>Last Name</b></label>
	      				<input type="text" value=<?php echo $ln;?> name="lnameSU" id="lnID" required>
	      				</div>
	      			</div>

	      			<div class="row">
	      				<div class="col-4">
	      				<label><b>Area</b></label>
	      				<input type="text" style="width:90%;" value=<?php echo $ar;?> name="areaSU" id="areaID" required>
	      				</div>

	      				<div class="col-4">	
	      				<label><b>Street Name</b></label>
	      				<input type="text" style="width:90%;" value=<?php echo $st;?> name="streetSU" id="streetID" required>
	      				</div>

	      				<div class="col-4">	
	      				<label><b>Building Number/Name</b></label>
	      				<input type="text" value=<?php echo $bld;?> name="buildSU" id="buildID" required>
	      				</div>
	      			</div>

	       				<button type="submit" class="signbtn" name = "signupbtn" >Sign Up</button>
	      			</fieldset>

	      			<br>
	      			Have an account? <a href="#" id="logHref">Login Here!</a>
	      	</form>
	    </div>
	    <?php }
		     else{
				$user->signup($storePw, $em, $fn, $ln , $ar, $st, $bld);
				header('Location: user/userhome.php');
			}
 		}

 			if (isset($_POST['loginbtn'])){

	 			$em = test_input($_POST["emailIn"]);
				$psw = test_input($_POST["pswIn"]);

				if($user->login($em, $psw)){
					header('Location: user/userhome.php');
				}else{
					?>
	    <div id="signIn" class="modal" style="display: block;  z-index: 2;">
			<form class="modal-form" name="frmSI" id="formSi" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	   			<span class="close" title="Close Modal" id="closeSi">×</span>
	   				<fieldset>
	   					<legend align="center">
	   						<img class="img-circle" alt="user" src="css/images/homer3.jpg"><br>
	   					</legend>
	   					<div style="color:red;">Invalid Email/Password Match!</div>
	   					<div id="errorSi"></div>
	     				<label><b>Email</b></label>
	       				<input type="text" id="emIn" placeholder="Enter Email" name="emailIn" required>

	      				<label><b>Password</b></label>
	      				<input type="password" placeholder="Enter Password" name="pswIn" id="pwIn" required>

	       				<button type="submit" class="signbtn" name="loginbtn">Log In</button>
	      			</fieldset>
	      	</form>	    	
	    </div>
					<?php
				}
 			}


 	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/topnav.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Foodies</title>	
</head>

<body onload="timeFunc()">
	<header class="homepage">
		<nav class="menu" id="navmenu">
			<ul>
				<li class="logo"> <a href= "home.php" class="log"> Foo<span class="org">d</span>ies </a></li>
				<li><a href=  "#" id ="logM">Log In</a></li>
				<li><a href = "#" id="createM">Create an Account</a></li>
				<li><a href = "#">Contact Us</a></li>
			</ul>
		</nav>
	</header>


	<main>
	<div class="instruct" id="fTitle">Order from your favorite<br> restaurants!</div>
     <br>
     
     <a href="#steps" class="bttn">How To Order</a>
     
	<a href="#steps" id="steps" >
	  	<span id="arrow-down">
	    <i class="fa fa-chevron-down"></i></span>
	</a>

	<div class="steps">
		<h1 class="cake">Order now, It's a piece of cake!<hr></h1>
		<div class="smallcol">
			<img src="css/images/search.png" alt="burger">
					<img src="css/images/arr1.png">
			<p>Enter your area</p>
		</div>


		<div class="smallcol">
			<img src="css/images/burger.png" alt="burger">
				<img src="css/images/arr2.png">
			<p>Choose from the menu</p>
		</div>

		<div class="smallcol">
			<img src="css/images/computer.png" alt="burger">
				<img src="css/images/arr3.png">
			<p>Confirm your order</p>
		</div>
		<div class="smallcol">
			<img src="css/images/car.png" alt="burger">
			<img src="css/images/ok.png">
			<p>Enjoy your food right at your doorstep!</p>
		</div>
	</div>

	
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

		<div id="signUp" class="modal">
	  			<form class="modal-form" name="frmSU" id="formSu" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	   				<span class="close" title="Close Modal" id="closeM">×</span>
	   				<fieldset>
	   					<legend align="center">
	   						<img class="img-circle" alt="user" src="css/images/homer3.jpg"><br>
	   					</legend>
	   					<div id="error"></div>
	     				<label><b>Email</b></label>
	       				<input type="text" id="em" placeholder="Enter Email" name="email" required>

	      				<label><b>Password</b></label>
	      				<input type="password" placeholder="Enter Password (4 or more characters!)" name="psw" id="pw" required>

	      				<label><b>Re-Enter Password</b></label>
	      				<input type="password" placeholder="We're not looking.." name="psw-repeat" id="rpw" required>

	      			<div class="row">
	      				<div class="col-6">
	      				<label><b>First Name</b></label>
	      				<input type="text" style="width:90%;"  placeholder="Enter First Name, Sir" name="fnameSU" id="fnID" required>
	      				</div>

	      				<div class="col-6">	
	      				<label><b>Last Name</b></label>
	      				<input type="text" placeholder="Enter First Name, Sir" name="lnameSU" id="lnID" required>
	      				</div>
	      			</div>


	      			<div class="row">
	      				<div class="col-4">
	      				<label><b>Area</b></label>
	      				<input type="text" style="width:90%;"  placeholder="Ex: Maadi, Nasr City, etc.." name="areaSU" id="areaID" required>
	      				</div>

	      				<div class="col-4">	
	      				<label><b>Street Name</b></label>
	      				<input type="text" style="width:90%;" placeholder="Enter Street Name Here.. " name="streetSU" id="streetID" required>
	      				</div>

	      				<div class="col-4">	
	      				<label><b>Building Number/Name</b></label>
	      				<input type="text" placeholder="Enter Building Here.." name="buildSU" id="buildID" required>
	      				</div>
	      			</div>

	       				<button type="submit" class="signbtn" name = "signupbtn" >Sign Up</button>
	      			</fieldset>

	      			<br>
	      			Have an account? <a href="#" id="logHref">Login Here!</a>
	      	</form>
	    </div>



	    <div id="signIn" class="modal">
			<form class="modal-form" name="frmSI" id="formSi" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	   			<span class="close" title="Close Modal" id="closeSi">×</span>
	   				<fieldset>
	   					<legend align="center">
	   						<img class="img-circle" alt="user" src="css/images/homer3.jpg"><br>
	   					</legend>
	   					<div id="errorSi"></div>
	     				<label><b>Email</b></label>
	       				<input type="text" id="emIn" placeholder="Enter Email" name="emailIn" required>

	      				<label><b>Password</b></label>
	      				<input type="password" placeholder="Enter Password" name="pswIn" id="pwIn" required>

	       				<button type="submit" class="signbtn" name="loginbtn">Log In</button>
	      			</fieldset>
	      	</form>	    	
	    </div>
	
	</main>


	<script type="text/javascript" src="js/SignUp.js"></script>
</body>
</html>
