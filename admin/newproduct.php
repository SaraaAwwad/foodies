<?php
require_once("/../classes/product.php");
require_once("/../classes/cuisine.php");
require_once("/../classes/areas.php");
session_start();
$restid = $_GET['id'];
$prod = new Product;
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
    <h1 id="Profileh">Add Product</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Restaurants</li>
  <li><a href="../admin/addrestaurant.php">Manage</a></li>
  <li>Add</li>
</ul>

	
<form action="" method="POST"  enctype="multipart/form-data">
<fieldset>
<legend>Product Information</legend>    
<label id="namelink">Product Name</label><br>
<input type="text" name="namearea" id="restarea"><br>
</fieldset>
<fieldset>
<legend>About Product</legend>
<label id="namelink">Description</label><br>
<textarea rows="10" name="desarea" id="restarea" cols="50"></textarea><br>
<label id="namelink">Category</label><br>
<input type="text" name="catarea" id="restarea"><br>
<label id="namelink">Image</label><br>
<input type="hidden" name="MAX_SIZE_FILE" value="90000000" />
<input id = "myimage" class="inputfile" type="file" name="myimage" accept="image/*"/><br>
<label id="namelink">Status</label><br>
<input type="radio" name="activation" value="1" checked> Active
<input type="radio" name="activation" value="0"> Inactive<br>
</fieldset>
<fieldset>
<legend>Prices</legend>
<input type="text" name="smallarea" id="restarea1" value="Small" readonly>
<input type="text" name="smallvalue" id="restarea2"><br> 
<input type="text" name="mediumarea" id="restarea1" value="Medium" readonly> 
<input type="text" name="mediumvalue" id="restarea2"><br> 
<input type="text" name="largearea" id="restarea1" value="Large" readonly> 
<input type="text" name="largevalue" id="restarea2"><br> 
</fieldset>
<input type="submit" name="update" id="saverest" value="Add"/>
<input type="button" id="cancelrest" value="Cancel"/>
</form>

<?php
if(isset($_POST['update']) && $_FILES['myimage']['size'] > 0){
	$aname = $_POST['namearea'];
	$bdes = $_POST['desarea'];
	$ccat = $_POST['catarea'];
  $estatus = $_POST['activation'];
  $frest = $_GET['id'];
	$small = $_POST['smallarea'];
  $smallv = $_POST['smallvalue'];
  $medium = $_POST['mediumarea'];
  $mediumv = $_POST['mediumvalue'];
  $large = $_POST['largearea'];
  $largev = $_POST['largevalue'];

  $folder= dirname(dirname(__FILE__)) ."\css\images\\";
  $upload_image=$_FILES['myimage']['name'];
  move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder".$_FILES['myimage']['name']);
  $images = '../css/images/'.$_FILES['myimage']['name'].'';

  $resultid = $prod->InsertInfo($aname,$bdes,$ccat,$images,$estatus,$frest);

  if(!empty($_POST['smallvalue']))
  { $prod->InsertNewValue($resultid,$small,$smallv); }
  else if(empty($_POST['smallvalue']))
  {$prod->InsertNewValue($resultid,$small,'0'); }

  if(!empty($_POST['mediumvalue']))
  { $prod->InsertNewValue($resultid,$medium,$mediumv); }
  else if(empty($_POST['mediumvalue']))
  {$prod->InsertNewValue($resultid,$medium,'0'); }


  if(!empty($_POST['largevalue']))
  { $prod->InsertNewValue($resultid,$large,$largev); }
  else if(empty($_POST['largevalue']))
  {$prod->InsertNewValue($resultid,$large,'0'); }

  header('Location: allproducts.php?id='.$restid.'');
}
?>
<script type="text/javascript" src="../js/AdminPage.js"></script>
<script type="text/javascript">
var cncl = document.getElementById("cancelrest");
cncl.addEventListener("click", cnclFunc);
function cnclFunc(){
window.location.href="allproducts.php?id=<?php echo''.$restid.'';?>";
}
</script>
</body>

</html>