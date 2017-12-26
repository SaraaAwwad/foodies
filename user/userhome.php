<?php 
session_start();
require_once("../classes/areas.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link rel="stylesheet" type="text/css" href="../css/topnav.css">
	<link rel="stylesheet" type="text/css" href="../css/userstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro|Raleway" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>User-HomePage</title>	
</head>

<?php include("header.php"); ?>

<body>
	
	<header class="homepage">
	</header>

	<div class="welcome">Find what's near you</div>
		<div class="searchBar">
	      	<select id="area">
	      		<?php $activeareas = Area::getActiveAreas(); 
	      		for($i=0; $i<count($activeareas); $i++){
	      			echo '<option>'.$activeareas[$i].'</option>';
	      			}?>
	      	</select>
		  
      	  	<button type="button" id="goButton">
      	  		GO!
      	  	</button>
    	</div>
	<main>
	</main>

	<?php include("footer.php") ?>
	
<script>
	var btn = document.getElementById("goButton");
	btn.addEventListener("click", goBtn);

	function goBtn(){
		var place = $('#area :selected').text();
		window.location.href='userrest.php?area='+place;
	}
</script>
</body>
</html>
