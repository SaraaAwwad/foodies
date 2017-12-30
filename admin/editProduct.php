<?php
require_once("/../classes/product.php");
require_once("/../classes/productvalue.php");
require_once("/../classes/cuisine.php");
require_once("/../classes/areas.php");
session_start();
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
$ProdObj = new Product($id);
$ProdVal= array();
$ProdVal = ProductValue::getAllValue($id);

render($ProdObj->ID,$ProdObj->Name,$ProdObj->Description,$ProdObj->Category,$ProdVal);
?>

<?php function render($id,$name,$des,$cat,$ProdVal){ ?>
    
<form action="" method="POST" enctype="multipart/form-data">
<fieldset>
<legend> Product Information </legend>
<b id="namelink">ID</b><br>
<input type="text" name="idarea" class="restarea" value="<?php echo $id; ?>" disabled="true"><br>  
<b id="namelink">Product Name</b><br>
<input type="text" name="namearea" class="restarea" value="<?php echo $name; ?>" ><br>
</fieldset>
<fieldset>
<legend>About Product</legend>
<label id="namelink">Description</label><br>
<textarea rows="10" name="desarea" onkeyup="adjust_textarea(this)" class="restarea" cols="50"><?php echo $des; ?></textarea><br>
<label id="namelink">Category</label><br>
<input type="text" name="catarea" class="restarea" value="<?php echo $cat;?>"><br>
<label id="namelink">Image</label><br>
<input type="hidden" name="MAX_SIZE_FILE" value="90000000" />
<input id = "myimage" type="file" name="myimage" class="inputfile" accept="image/*"/><br>
</fieldset>
<fieldset>
<legend>Prices</legend>
<?php for ($j=0; $j<1; $j++){ ?>
<input type="text" name="smallarea" id="restarea1" value="<?php echo $ProdVal[$j+2]->Size;?>" readonly>
<input type="text" name="smallvalue" class="restarea2" id="price1" value="<?php echo $ProdVal[$j+2]->Price;?>"><br> 

<input type="text" name="mediumarea" id="restarea1" value="<?php echo $ProdVal[$j+1]->Size;?>" readonly> 
<input type="text" name="mediumvalue" class="restarea2" id="price2" value="<?php echo $ProdVal[$j+1]->Price;?>"><br> 

<input type="text" name="largearea" id="restarea1" value="<?php echo $ProdVal[$j]->Size;?>" readonly> 
<input type="text" name="largevalue" class="restarea2" id="price3" value="<?php echo $ProdVal[$j]->Price;?>"><br>
<?php } ?> 
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
  
   if((!empty($_POST['smallvalue'])) && (is_numeric($_POST['smallvalue'])))
   {
	   $smallv = abs($smallv);
	   $ProdObj->delOldProducts($small,$smallv); } 
   else if((!empty($_POST['smallvalue'])) && (!is_numeric($_POST['smallvalue'])))
   {$ProdObj->delOldProducts($small,'0');}  
   else if(empty($_POST['smallvalue']))
   {$ProdObj->delOldProducts($small,'0'); } 

  if((!empty($_POST['mediumvalue'])) && (is_numeric($_POST['mediumvalue'])))
  {   $mediumv = abs($mediumv);
	  $ProdObj->delOldProducts($medium,$mediumv); }
  else if((!empty($_POST['mediumvalue'])) && (!is_numeric($_POST['mediumvalue'])))
 {$ProdObj->delOldProducts($medium,'0'); }  
  else if(empty($_POST['mediumvalue']))
  {$ProdObj->delOldProducts($medium,'0'); }  

  if((!empty($_POST['largevalue'])) && (is_numeric($_POST['largevalue'])))
  {   $largev = abs($largev);
	  $ProdObj->delOldProducts($large,$largev);}
  else if((!empty($_POST['largevalue'])) && (!is_numeric($_POST['largevalue'])))
  {$ProdObj->delOldProducts($large,'0'); }
  else if(empty($_POST['largevalue']))
  {$ProdObj->delOldProducts($large,'0'); }

  if(!empty($_FILES['myimage']['name'])) {
  $folder= dirname(dirname(__FILE__)) ."\css\images\\";
  $upload_image=$_FILES['myimage']['name'];
  move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder".$_FILES['myimage']['name']);
  $images = "../css/images/".$_FILES['myimage']['name'].""; 
  $ProdObj->updateInfo($aname,$bdes,$ccat,$images);
  }else{
  $ProdObj->updateInfo($aname,$bdes,$ccat,'');
  }
  header('Location: allproducts.php?id='.$ProdObj->RestID.'');
}

?>

<script type="text/javascript" src="../js/AdminPage.js"></script>
<script type="text/javascript">
var cncl = document.getElementById("cancelrest");
cncl.addEventListener("click", cnclFunc);
function cnclFunc(){
 window.location.href="allproducts.php?id=<?php echo''.$ProdObj->RestID.'';?>";
}

function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
</body>

</html>
