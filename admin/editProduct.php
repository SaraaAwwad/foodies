<?php
require_once("/../classes/product.php");
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
$prod = new Product;
$id = $_GET['id'];
$result = $prod->getSelectProduct($id);
$name = $result['Name'];
$des = $result['Description'];
$cat = $result['Category'];
$id = $result['ID'];
$image = $result['Image'];
$restid = $result['RestID'];

$lsmall = "Small";
$value1 = $prod->getPValue($id,$lsmall);
$Small = $value1['Price'];

$lmedium = "Medium";
$value2 = $prod->getPValue($id,$lmedium);
$Medium = $value2['Price'];

$llarge = "Large";
$value3 = $prod->getPValue($id,$llarge);
$Large = $value3['Price'];
render($id,$name,$des,$cat,$image,$Small,$Medium,$Large);
?>

<?php function render($id,$name,$des,$cat,$image,$Small,$Medium,$Large){ ?>
		
<form action="" method="POST">
<b id="namelink">ID</b><br>
<input type="text" name="idarea" id="restarea" value="<?php echo $id; ?>" disabled="true"><br>	
<b id="namelink">Product Name</b><br>
<input type="text" name="namearea" id="restarea" value="<?php echo $name; ?>" ><br>
<b id="namelink">Description</b><br>
<textarea rows="10" name="desarea" id="restarea" cols="50"><?php echo $des; ?></textarea><br>
<b id="namelink">Category</b><br>
<input type="text" name="catarea" id="restarea" value="<?php echo $cat;?>"><br>
<b id="namelink">Image (With its Extension)</b><br>
<input type="text" name="imagearea" id="restarea" value="<?php echo $image;?>"><br>
<input type="text" name="smallarea" id="restarea1" value="Small" readonly>
<input type="text" name="smallvalue" id="restarea2" value="<?php echo $Small;?>"><br> 
<input type="text" name="mediumarea" id="restarea1" value="Medium" readonly> 
<input type="text" name="mediumvalue" id="restarea2" value="<?php echo $Medium;?>"><br> 
<input type="text" name="largearea" id="restarea1" value="Large" readonly> 
<input type="text" name="largevalue" id="restarea2" value="<?php echo $Large;?>"><br> 

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
	$dimage = $_POST['imagearea'];
	$small = $_POST['smallarea'];
  $smallv = $_POST['smallvalue'];
  $medium = $_POST['mediumarea'];
  $mediumv = $_POST['mediumvalue'];
  $large = $_POST['largearea'];
  $largev = $_POST['largevalue'];
  
  if(isset($_POST['smallvalue']))
  {
    $prod->delSmallProducts($id,$small,$smallv);
  }else{
    $prod->delP($id,$small);
  } 

  if(isset($_POST['mediumvalue']))
  {
    $prod->delSmallProducts($id,$medium,$mediumv);
  }else{
    $prod->delP($id,$medium);
  } 

  if(isset($_POST['largevalue']))
  {
    $prod->delSmallProducts($id,$large,$largev);
  }else{
    $prod->delP($id,$large);
  } 

	$prod->updateInfo($id,$aname,$bdes,$ccat,$dimage);
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