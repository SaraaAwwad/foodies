<?php
require_once("/../classes/restaurant.php");
require_once("/../classes/cuisine.php");
require_once("/../classes/areas.php");
session_start();
?>
<?php
$rest = new Restaurant;
$cuisine = new Cuisine;
$areato = new Area;
?>
<!DOCTYPE html>
<html>
<head>
<title> Add </title>
<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>

<?php include("adminheader.php"); ?>
<?php include("adminsidenav.php"); ?>

<div class="main2" >
<div class="container" id="showcase">
    <h1 id="Profileh">Update Restaurant</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Restaurants</li>
  <li><a href="../admin/addrestaurant.php">Manage</a></li>
  <li>Update</li>
</ul>

<?php 
$id = $_GET['id'];
$result = $rest->getSelect($id);
$name = $result['Name'];
$hot = $result['Hotline'];
$delvfees = $result['DelvFees'];
$delvtime = $result['DelvTime'];
$id = $result['ID'];
$image = $result['Image'];
render($id,$name,$hot,$delvfees,$delvtime,$image);
?>

<?php function render($id,$name,$hot,$delvfees,$delvtime,$image){ ?>
		
<form action="" method="POST">
<b id="namelink">ID</b><br>
<input type="text" name="idarea" id="restarea" value="<?php echo $id; ?>" disabled="true"><br>	
<b id="namelink">Restaurant Name</b><br>
<input type="text" name="namearea" id="restarea" value="<?php echo $name; ?>" ><br>
<b id="namelink">Hotline</b><br>
<input type="text" name="hotarea" id="restarea" value="<?php echo $hot; ?>"><br>
<b id="namelink">Delivery Fees</b><br>
<input type="text" name="feesarea" id="restarea" value="<?php echo $delvfees;?>"><br>
<b id="namelink">Delivery Time</b><br>
<input type="text" name="timearea" id="restarea" value="<?php echo $delvtime;?>"><br>
<b id="namelink">Image (With its Extension)</b><br>
<input type="text" name="imagearea" id="restarea" value="<?php echo $image;?>"><br>

<b id="namelink">Cuisine</b><br>
<select name="test1[]" id="soflow" multiple> 
  <option value="Sandwiches"> Sandwiches </option> 
  <option value="Pizza"> Pizza </option> 
  <option value="Salad"> Salad </option>
  <option value="Beverages"> Beverages </option>
  <option value="Desserts"> Desserts </option>
  <option value="Other"> Other </option> 
</select><br>


<b id="namelink">Areas</b><br>
<select name="test[]" id="soflow2" multiple>  
  <option value="Maadi"> Maadi </option>
  <option value="Nasr City"> Nasr City </option> 
  <option value="Heliopolis"> Heliopolis </option>
  <option value="5th Settlement"> 5th Settlement </option>
  <option value="Zamalek"> Zamalek </option> 
  <option value="Sherouk"> Sherouk </option>
</select><br>

<input type="submit" name="update" id="saverest" value="Update"/>
<input type="button" id="cancelrest" value="Cancel"/>
</form>

<?php  }  ?>
<?php
if(isset($_POST['update'])){
	$id = $_GET['id'];
	$a = $_POST['namearea'];
	$b = $_POST['hotarea'];
	$c = $_POST['feesarea'];
	$d = $_POST['timearea'];
	$e = $_POST['imagearea'];

	if(isset($_POST['test1'])){
	$cuisine->delCuisine($id);
	foreach ($_POST['test1'] as $selectedOption)
    { $cuisine->updateCuisine($id,$selectedOption); }}
    
    if(isset($_POST['test'])){
    $areato->delArea($id);
	foreach ($_POST['test'] as $selected)
    { $areato->updateArea($id,$selected); }}

	$rest->updateInfo($id,$a,$b,$c,$d,$e,'');
    header("Location: addrestaurant.php");
}

?>

<script type="text/javascript" src="../js/AdminPage.js"></script>
<script type="text/javascript">
var cncl = document.getElementById("cancelrest");
cncl.addEventListener("click", cnclFunc);
function cnclFunc(){
 window.location.href="addrestaurant.php";
}
</script>
</body>

</html>