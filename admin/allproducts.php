<?php
session_start();
require_once("../classes/product.php");
$prod = new Product;
$allProd = array();
if(isset($_GET['id'])){
$place = $_GET['id'];
$allProd = $prod->getAllProducts($place);
}

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
<body>

<?php include("adminheader.php"); ?>

<h1 id="imagedesc">Adding More Products</h1>
<p id="descriptionheader"> Foodies offers a range of delicious food to their customers. </p>
<div id="imageheader">
<img src="../css/images/bread1.jpg" />
</div>
 
<main>
	
<div class="Bgimage">
<?php include("adminsidenav.php"); ?>
</div>

<div class="main2">
<div class="container" id="showcase">
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
    <li><a href="../admin/AdminPage.php">Admin</a></li>
    <li><a href="../admin/addrestaurant.php">Restaurants</a></li>
    <li>Stock</li>
</ul>
<?php echo '<a id="addrest" href="newproduct.php?id='.$place.'"><i class="fa fa-plus"></i>Add Product</a>'; ?>
</div>
<table class="highlight" >
        <thead>
          <tr>
              <th>ID</th>
			  <th>Image</th>
              <th>Name</th>
			  <th>Description</th>
			  <th>Category</th>
			  <th>Prices</th>
			  <th>Status</th>
			  <th></th>
        </div>
        </tr>
        </thead>

        <tbody id="restaurantTable">
		<?php 
			for($i=0; $i<count($allProd); $i++){ ?>
            <tr id="row1">
            <td><strong><?php echo $allProd[$i]['ID'];?></strong></td>
			<td><img src="<?php echo $allProd[$i]['Image'];?>" width="50" height="50"></td>
            <td><strong><?php echo $allProd[$i]['Name']; ?></strong></td>
			<td><?php echo $allProd[$i]['Description'];?></td>
			<td><?php echo $allProd[$i]['Category'];?></td>
			<td><?php for ($j=0; $j<count($prod->values[$i]); $j+=2){ ?>
			<span><?php if($j>0){ ?> <br><br> <?php } ?><?php echo $prod->values[$i][$j]; ?></span>$<br><span><?php echo $prod->values[$i][$j+1]; ?></span>
	        <?php } ?></td>
	        <?php if($allProd[$i]['Status'] == '1' ){
	        echo '<td id="active"> Active </td>'; }
	        else if ($allProd[$i]['Status'] == '0'){
	        echo '<td id="inactive"> Inactive</td>';} ?>
			<td align="center"><?php echo '<a class = "butt" href="editProduct.php?id='.$allProd[$i]['ID'].'">Update</a>'; ?><br>
            <?php if($allProd[$i]['Status'] == '1' ){
	        echo ' <a class = "butt" href="inactivateProduct.php?id='.$allProd[$i]['ID'].'">Inactivate</a>'; }else if ($allProd[$i]['Status'] == '0'){
	        echo ' <a class = "butt" href="inactivateProduct.php?id='.$allProd[$i]['ID'].'">Activate</a>'; } ?><br>
            <?php echo '<a class = "butt" href="deleteProduct.php?id='.$allProd[$i]['ID'].'">Delete</a>'; ?></td>
			</tr>
		    <?php } ?>
        </tbody>
        </table>
        </div>    
		</div>
		</main>
		<script type="text/javascript" src="../js/AdminPage.js"></script>
		<script>
			if (screen.width < 500) {
  
  $("body").addClass("nohover");
  $("td, th")
    .attr("tabindex", "1")
    .on("touchstart", function() {
      $(this).focus();
    });
  
}

		</script>
</body>
</html>