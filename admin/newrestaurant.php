<?php 
require_once('dbconnect.php');
$db_obj = new dbconnect;
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Add </title>
<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body style="background-color: #f0f5f5;">
<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "AdminPage.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="log"> Foo<span class="org">d</span>ies </a></li>
        <li><a href="../adminlogin.php">Logout</a></li>
			</ul>
			</nav>
</header>

<?php include("adminsidenav.php"); ?>

<script type="text/javascript" src="js/AdminPage.js"></script>

<div class="main2" >
<div class="container" id="showcase">
    <h1 id="con">New Restaurant</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.html">Admin</a></li>
  <li>Restaurants</li>
  <li>Manage</li>
  <li>New Restaurant</li>
</ul>

<form name="restForm" action="Add.php" method="POST">

	<b id="greenField">Name</b>
	<br>
	<input type="text" name="Name" id="restarea" required >
	<br>

<b id="greenField">Cuisine</b>
<br>
<input type="text" name="Type" id="restarea" required >
<br>

	<b id="greenField">Delivery Area</b>
	<br>
	<br>
	<select name="Area" id="restarea" required>

<?php
    $_Area = $db_obj->SelectAll('areas');
    $Count = count($_Area);
  	echo'<option value="">-----------------</option>';
    for ($i = 0; $i < $Count; $i++) {
                                                    
        echo  "<option  value='".$_Area[$i]['ID']."'>".$_Area[$i]['Area']."</option>";
    }
    ?>
</select>
<br>

<!--CHANGED HERE-->
   <!--  <br>
<b id="greenField">Areazz</b>
<br>
<select multiple="multiple" name="restarea[]" id="restarea">
	
<?php 

	$restAreaz = $db_obj->SelectAll('areas');
    $Count = count($_Area);
  	echo'<option value="">-----------------</option>';
    for ($i = 0; $i < $Count; $i++) {
                                                    
        echo  "<option  value='".$_Area[$i]['ID']."'>".$_Area[$i]['Area']."</option>";
    }



?>

</select> -->
<!-- <b>Area</b>
<br>
<select multiple="multiple" name="Area[]" id="area">
	<option value="Ffth" id="Fifth">Fifth Settlement</option>
	<option value="Mdi" id="Maadi">Maadi</option>
	<option value="Nsr" id="Nasr">Nasr City</option>
	<option value="Hlp" id="Helio">Heliopolis</option>
	<option value="Sher" id="Sheraton">Sheraton</option>
	<option value="Rh" id="Rehab">Rehab</option>
	<option value="Oct" id="October">6 October</option>
	<option value="Dki" id="Dokki">Dokki</option>
	<option value="Obo" id="Obour">Obour</option>
	<option value="Mok" id="Mokattam">Mokattam</option>

</select>
 -->

<!--<button type="button" name="addagain" id="again">Add Again</button>-->
	<br>

<!-- 
	<b id="greenField">Area</b>
	<br>
	<select name="Area2" id="restarea2">
			<option name="Maadi">Maadi</option>

	</select> -->

<b class="addNewRest">Hotline</b>
<br>
<input type="text" name="Hotline" id="restarea" required>
<br>

	<b class="addNewRest">Delivery Fees</b>
	<br>
	<input type="text" name="DelvFees" id="restarea" required>
	<br>

<b class="addNewRest">Delivery Time</b>
<br>
<input type="text" name="DelvTime" id="restarea" required>
<br>

	<b class="addNewRest">Image</b>
	<br>
	<input type="text" name="Image" id="restarea" required>
	<br>

<b class="addNewRest">Admin ID</b>
<br>
<select name="AdminID" id="restarea" required>
	<?php
    $_Area = $db_obj->SelectAll('admin');
    $Count = count($_Area);
  	echo'<option value="">-----------------</option>';
    for ($i = 0; $i < $Count; $i++) {
                                                    
        echo  "<option  value='".$_Area[$i]['ID']."'>".$_Area[$i]['Email']."</option>";
    }
    ?>
</select>
<br>

<button type="submit" name="saver" id="saverest">Add</button>

<button type="submit" id="cancelrest">Cancel</button>

</form>

 </div>

 
        </div>    
		
		<script type="text/javascript" src="../js/AdminPage.js"></script>
		<script type="text/javascript" src="js/newrestaurant.js"></script>
</body>

</html>
