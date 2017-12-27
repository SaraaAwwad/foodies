<?php
require_once("/../classes/product.php");
require_once("/../classes/cuisine.php");
require_once("/../classes/areas.php");
session_start();
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
    <h1 id="Profileh">Update Product</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Restaurants</li>
  <li><a href="../admin/addrestaurant.php">Manage</a></li>
  <li>Update</li>
</ul>

<?php
$id = $_GET['id'];
$ProdObj = array();
$ProdObj= new Product($id);

$lsmall = "Small";
$value1 = $prod->getPValue($id,$lsmall);
$Small = $value1['Price'];

$lmedium = "Medium";
$value2 = $prod->getPValue($id,$lmedium);
$Medium = $value2['Price'];

$llarge = "Large";
$value3 = $prod->getPValue($id,$llarge);
$Large = $value3['Price'];

render($ProdObj->ID,$ProdObj->Name,$ProdObj->Description,$ProdObj->Category,$Small,$Medium,$Large);
?>

<?php function render($id,$name,$des,$cat,$Small,$Medium,$Large){ ?>
		
<form action="" method="POST" enctype="multipart/form-data">
<fieldset>
<legend> Product Information </legend>
<b id="namelink">ID</b><br>
<input type="text" name="idarea" id="restarea" value="<?php echo $id; ?>" disabled="true"><br>	
<b id="namelink">Product Name</b><br>
<input type="text" name="namearea" id="restarea" value="<?php echo $name; ?>" ><br>
</fieldset>
<fieldset>
<legend>About Product</legend>
<label id="namelink">Description</label><br>
<textarea rows="10" name="desarea" onkeyup="adjust_textarea(this)" id="restarea" cols="50"><?php echo $des; ?></textarea><br>
<label id="namelink">Category</label><br>
<input type="text" name="catarea" id="restarea" value="<?php echo $cat;?>"><br>
<label id="namelink">Image</label><br>
<input type="hidden" name="MAX_SIZE_FILE" value="90000000" />
<input id = "myimage" type="file" name="myimage" class="inputfile" accept="image/*"/><br>
</fieldset>
<fieldset>
<legend>Prices</legend>
<input type="text" name="smallarea" id="restarea1" value="Small" readonly>
<input type="text" name="smallvalue" id="restarea2" value="<?php echo $Small;?>"><br> 
<input type="text" name="mediumarea" id="restarea1" value="Medium" readonly> 
<input type="text" name="mediumvalue" id="restarea2" value="<?php echo $Medium;?>"><br> 
<input type="text" name="largearea" id="restarea1" value="Large" readonly> 
<input type="text" name="largevalue" id="restarea2" value="<?php echo $Large;?>"><br> 
</fieldset>
<input type="submit" name="update" id="saverest" value="Update"/>
<input type="button" id="cancelrest" value="Cancel"/>
</form>




<?php  }  ?>

<?php
if(isset($_POST['update'])){
	$id = $_GET['id'];
	$aname = $_POST['namearea'];
	$bdes = $_POST['desarea'];
	$ccat = $_POST['catarea'];
	$small = $_POST['smallarea'];
  $smallv = $_POST['smallvalue'];
  $medium = $_POST['mediumarea'];
  $mediumv = $_POST['mediumvalue'];
  $large = $_POST['largearea'];
  $largev = $_POST['largevalue'];
  
  if(isset($_POST['smallvalue']))
  { $prod->delSmallProducts($id,$small,$smallv); }else{
    $prod->delP($id,$small); } 

  if(isset($_POST['mediumvalue']))
  { $prod->delSmallProducts($id,$medium,$mediumv); }else{ 
    $prod->delP($id,$medium); } 

  if(isset($_POST['largevalue']))
  { $prod->delSmallProducts($id,$large,$largev); }else
  { $prod->delP($id,$large); } 

  if(!empty($_FILES['myimage']['name'])) {
  $folder= dirname(dirname(__FILE__)) ."\css\images\\";
  $upload_image=$_FILES['myimage']['name'];
  move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder".$_FILES['myimage']['name']);
  $images = "../css/images/".$_FILES['myimage']['name'].""; 
  $prod->updateInfo($id,$aname,$bdes,$ccat,$images);
  }else{
  $prod->updateInfoWithoutImage($id,$aname,$bdes,$ccat);
  }
  header('Location: allproducts.php?id='.$ProdObj->RestID.'');
}

?>

<script type="text/javascript" src="../js/AdminPage.js"></script>
<script type="text/javascript">
var cncl = document.getElementById("cancelrest");
cncl.addEventListener("click", cnclFunc);
function cnclFunc(){
 window.location.href="allproducts.php?id=<?php echo''.$restid.'';?>";
}

function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
</body>

</html>