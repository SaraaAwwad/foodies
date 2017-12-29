<?php 
session_start();
require("classes/user.php");
?>
<?php 
	$upmode = 0;
	$inmode = 0;

		if (isset($_POST['signupbtn'])){

			$em = test_input($_POST["email"]);
			$psw = test_input($_POST["psw"]);
			$fn = test_input($_POST["fnameSU"]);
			$ln = test_input($_POST["lnameSU"]);
			$ar = test_input($_POST["areaSU"]);
			$st = test_input($_POST["streetSU"]);
			$bld = test_input($_POST["buildSU"]);
			$rep = test_input($_POST["psw-repeat"]);
			$phonenum = test_input($_POST["phonenum"]);
			$phonenum ='+2'.$phonenum;
			$storePw = password_hash($psw, PASSWORD_BCRYPT, array('cost'=>8));

				if(User::signup($storePw, $em, $fn, $ln , $ar, $st, $bld, $phonenum)){
					header('Location: user/userhome.php');
	     		}else{
					outputsignup('block');
					$upmode=1;
					echo '<script type="text/javascript">',
							'var error = document.getElementById("error");
							error.innerHTML = "Sorry, Email Already Exists! <br><br>";',
							'</script>';
				}
 		}
 		//endof signup

 		if (isset($_POST['loginbtn'])){

	 			$em = test_input($_POST["emailIn"]);
				$psw = test_input($_POST["pswIn"]);

				if(User::login($em, $psw)){
					header('Location: user/userhome.php');
					//exit();
				}else{
						outputsignin('block');
						$inmode=1;
						echo '<script type="text/javascript">',
							'var error = document.getElementById("errorSi");
							error.innerHTML = "Email/Password not matching or doesnt exist! <br><br>";',
							'</script>';					
				}
 			}
 		//endof login

 	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}

	function outputsignup($display){

		echo'<div id="signUp" class="modal" style="display:'.$display.';">
	  			<form class="modal-form" name="frmSU" id="formSu" method="post" action="">
	   				<span class="close" title="Close Modal" id="closeM">×</span>
	   				<fieldset>
	   					<legend align="center">
	   						<img class="img-circle" alt="user" src="css/images/homer3.jpg"><br>
	   					</legend>
	   					<div id="error" class="err"></div>
	   				<div class="row">

	     				<div class="col-6">
	     				<label><b>Email</b></label>
	       				<input type="text" style="width:90%;" id="em" placeholder="Enter Email" name="email" required>
	       				</div>

	       				<div class="col-6">
	      				<label><b>Password</b></label>
	      				<input type="password"  placeholder="Enter Pass(4 or more characters!)" name="psw" id="pw" required>
	      				</div>
	       			
	       			</div>

	       			<div class="row">
	
	      				<div class="col-6">
	      				<label><b>Re-Enter Password</b></label>
	      				<input type="password" style="width: 90%" placeholder="We\'re not looking.." name="psw-repeat" id="rpw" required>
	      				</div>


	       				<div class="col-6">
	      				<label><b>Phone Number</b></label>
	      				<input type="text" name="phonenum" id="phnum" placeholder="Enter Number Here.." required>
	      				</div>
	      			</div>

	      			<div class="row">
	      				<div class="col-6">
	      				<label><b>First Name</b></label>
	      				<input type="text" style="width:90%;"  placeholder="Enter First Name, Sir" name="fnameSU" id="fnID" required>
	      				</div>

	      				<div class="col-6">	
	      				<label><b>Last Name</b></label>
	      				<input type="text" placeholder="Enter Last Name, Sir" name="lnameSU" id="lnID" required>
	      				</div>
	      			</div>


	      			<div class="row">
	      				<div class="col-4">
	      				<label><b>Area</b></label>
	      				<input type="text" style="width:90%;"  placeholder="Ex:Maadi,NasrCity,etc.." name="areaSU" id="areaID" required>
	      				</div>

	      				<div class="col-4">	
	      				<label><b>Street Name</b></label>
	      				<input type="text" style="width:90%;" placeholder="Enter StreetName Here.. " name="streetSU" id="streetID" required>
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
	    </div>';
	}

	function outputsignin($display){

	   echo'<div id="signIn" class="modal" style="display:'.$display.'";">
			<form class="modal-form" name="frmSI" id="formSi" method="post" action="home.php">
	   			<span class="close" title="Close Modal" id="closeSi">×</span>
	   				<fieldset>
	   					<legend align="center">
	   						<img class="img-circle" alt="user" src="css/images/homer3.jpg"><br>
	   					</legend>
	   					<div id="errorSi" class="err"></div>
	     				<label><b>Email</b></label>
	       				<input type="text" id="emIn" placeholder="Enter Email" name="emailIn" required>

	      				<label><b>Password</b></label>
	      				<input type="password" placeholder="Enter Password" name="pswIn" id="pwIn" required>

	       				<button type="submit" class="signbtn" name="loginbtn">Log In</button>
	      			</fieldset>
	      	</form>	    	
	    </div>';
	}
?>
<!DOCTYPE html>
<html>
<head>
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
	</main>
<div class="row-gap"></div>

	<?php
	
		if($inmode<1)
		{outputsignin('none');}

		if($upmode<1)
		{outputsignup('none');}
	?>
	
	<script type="text/javascript" src="js/SignUp.js"></script>
</body>
</html>
