<?php
require_once("/../classes/restaurant.php");
require_once("/../classes/cuisine.php");
session_start();
?>
<?php
$rest = new Restaurant;
$cuisine = new Cuisine;
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
    <h1 id="con">Update Restaurant</h1>
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
$result2 = $cuisine->getcuisine($id);
$type = $result2['Type'];
render($id,$name,$hot,$delvfees,$delvtime,$image,$type);
?>

<?php function render($id,$name,$hot,$delvfees,$delvtime,$image,$type){ ?>
		
<form action="" method="POST">
<b style="color: green;">ID</b><br>
<input type="text" name="idarea" id="restarea" value="<?php echo $id; ?>" disabled="true"><br>	
<b style="color: green;">Name</b><br>
<input type="text" name="namearea" id="restarea" value="<?php echo $name; ?>" ><br>
<b style="color: green;">Hotline</b><br>
<input type="text" name="hotarea" id="restarea" value="<?php echo $hot; ?>"><br>
<b style="color: green;">Delivery Fees</b><br>
<input type="text" name="feesarea" id="restarea" value="<?php echo $delvfees;?>"><br>
<b style="color: green;">Delivery Time</b><br>
<input type="text" name="timearea" id="restarea" value="<?php echo $delvtime;?>"><br>
<b style="color: green;">Image (With its Extension)</b><br>
<input type="text" name="imagearea" id="restarea" value="<?php echo $image;?>"><br>
<b style="color: green;">Cuisine</b><br>
<input type="text" name="cuisinearea" id="restarea" value="<?php echo $type;?>"><br>
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
	$f = $_POST['cuisinearea'];
	$rest->updateInfo($id,$a,$b,$c,$d,$e,'');
	$rest->updateInfo2($id,$f);
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