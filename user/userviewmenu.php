<?php
session_start();
require_once("../classes/product.php");
require_once("../classes/restaurant.php");
$prod = new Product;
$rest = new Restaurant;

$allProd = array();
$place = 0;
$area = 0;

if(isset($_GET['Area'])){
$area =$_GET['Area'];
}

if(isset($_GET['Rest'])){
$place =$_GET['Rest'];
$rest->getInfo($place);
$allProd = $prod->getProduct($place);
}

$ur ="Rest=".$place."&Area=".$area;
$shopping_session = "shoppingcart".$place;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/topnav.css">
	<link rel="stylesheet" type="text/css" href="../css/userstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>User-Menu</title>	
</head>

<?php include("header.php"); ?>

<body>
	
	<header class="menuhead">
		<h3 id="descheader">foodies offer a reliable service</h3>
	</header>
	
	<main>

<input type="hidden" id="shoppingrest" value="<?php echo $shopping_session;?>" >
<input type="hidden" id="carturl" value="<?php echo $ur; ?>" >


	<div class="row">
		<div class="col-7">
			<div class="centview cent-prodc">
				<input type="text" placeholder="Search for Products Here.." id="searchInput">
				<table id="rTable">
					<?php 
					for($i=0; $i<count($allProd); $i++){
					echo'
						<tr>
						<td style="width: 70%;">
							<div>
								<img src="../css/images/'.$allProd[$i]['Image'].'" width="100" height="100">
							</div>
							<div class="right-info"> 
								<h2 id="Name'.$allProd[$i]['ID'].'">'.$allProd[$i]['Name'].'</h2>
								<p>'.$allProd[$i]['Description'].'</p>
							</div>
						</td>

						<td style="width:30%; text-align:left;" >';

						for ($j=0; $j<count($prod->values[$i]); $j+=2){
							echo'<button class="add-prd addtocart" id="'.$j.'_'.$allProd[$i]['ID'].'"></button>
							 <span id="Price'.$j.'_'.$allProd[$i]['ID'].'">'.$prod->values[$i][$j].'</span> EGP -
							<span>'.$prod->values[$i][$j+1].'</span> <hr>'
							;}
						echo'</td>
						</tr>';
						}
					?>
				</table>
			</div>
		</div>

		<div class="col-5">

			<div class="container-shop">
				<div class="shop-cart" id="order_table">

					 <?php  
                        if(!empty($_SESSION[$shopping_session])){  
                            $total = 0;  
                            echo'
                            <h2 id="test">Your Plate</h2> <br><hr>
                            <table>  
                                    <tr>  
                                         <th width="40%">Product Name</th>  
                                         <th width="10%">Quantity</th>  
                                         <th width="20%">Price</th>  
                                         <th width="15%">Total</th>  
                                         <th width="5%"></th>  
                                    </tr>';
                            foreach($_SESSION[$shopping_session] as $keys => $values){
                            	?>
                            		<tr>  
                                         <td><?php echo $values["product_name"]; ?></td>  
                                         <td><input type="number" min="1" class="quantity"  id ="qt.<?php echo $values["product_id"] ?>" value="<?php echo $values["product_quantity"]?>"> </td> 

                                         <td align="right">$ <?php echo $values["product_price"]; ?></td>  
                                         <td align="right">$ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>  
                                         <td><button name="delete"  class="deletefromcart" id="<?php echo $values["product_id"]?>"></button></td>  
                                    </tr>  
                        <?php  
                                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                                }  
                                $_SESSION['total']=number_format($total, 2);
                        ?>			

                                    <form method="post" action="cart.php?Rest=<?php echo $place ?>&Area=<?php echo $area ?>"> 
                        			<tr>  
                                         <td colspan="3" align="right">Total</td>
                                         <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                                         <input type="hidden" name="totalprice" value="<?php echo number_format($total, 2);?>">
                                         <td></td>  
                                    </tr>  
                                    <tr>  
                                         <td colspan="5" align="center">   
                                            <input type="submit" name="place_order" class="placeorder" value="Place Order" />       
                                         </td>  
                                    </tr>
                                    </form>
                                </table>
                <?php  
                    }else{
                    	echo'<h3>Add to Your Plate</h3>
					<hr>
					Your current plate is empty.
					<br>
					<img src="../css/images/plate.png" alt="plate" width="170" height="170">
					</div>';
                    }?>

			</div>
				<?php 
				if(!empty($_SESSION[$shopping_session])){
			    echo'Delivery fees:'. $rest->DelvFees .' EGP<br>
				Estimated Time: '. $rest->DelvTime ;}  
				?>                                 
		</div>
	</div>
</div>
</main>

<script type="text/javascript" src="../js/usersearch.js"></script>
<script type="text/javascript" src="../js/usercart.js"></script>
</body>
</html>