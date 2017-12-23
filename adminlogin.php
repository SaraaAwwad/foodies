<?php 
session_start();
require("classes/admin.php");
?>
<?php 
$admin = new Admin;

if (isset($_POST['loginbtn']))
    {

	 			$em = test_input($_POST["emailIn"]);
				$psw = test_input($_POST["pswIn"]);
				if($admin->login($em, $psw)){
					header('Location: admin/AdminPage.php?id='.$_SESSION['adminID'].'');
					//exit();
				}else{
						echo '<script type="text/javascript">',
							'var error = document.getElementById("errorSi");
							error.innerHTML = "Email/Password not matching or doesnt exist! <br><br>";',
							'</script>';					
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
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
	<title>Foodies</title>	
</head>

<body>
	<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "home.php" class="log"> Foo<span class="org">d</span>ies </a></li>
			</ul>
		</nav>

	<main>


	    <div id="signIn" style="padding: 120px 0px;">
			<form class="modal-form" name="frmSI" id="formSi" method="post" action="">
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

</body>
</html>
