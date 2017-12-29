<?php
session_start();
header('Content-Type: application/json');

$order_table = '';  
$message = ''; 

if(isset($_POST["product_id"]))  
{   
	$shoppingrest =$_POST["rest_id"]; //session name

  //to be used when place order is clicked
  $cart_url = $_POST["cart_url"];

    //the add case
      if($_POST["action"] == "add")  {

      	if(isset($_SESSION[$shoppingrest]))  
           {  
                $is_available = 0;  

                foreach($_SESSION[$shoppingrest] as $keys => $values)  
                {  
                    /*if($_SESSION[$shoppingrest][$keys]['product_id'] == $_POST["product_id"])  
                    {  
                      $is_available++;  
                      $_SESSION[$shoppingrest][$keys]['product_quantity'] += $_POST["product_quantity"];
                    }*/ //works both ways..
                
                     if($values['product_id'] == $_POST["product_id"])  
                     {  
                          $is_available++;  
                          $_SESSION[$shoppingrest][$keys]['product_quantity'] += $_POST["product_quantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'product_id'         =>     $_POST["product_id"],  
                          'product_name'       =>     $_POST["product_name"],  
                          'product_price'      =>     $_POST["product_price"],  
                          'product_quantity'   =>     $_POST["product_quantity"]  
                     );  
                     $_SESSION[$shoppingrest][] = $item_array;  
                }  
           }  
        else  
           {  
                $item_array = array(  
                     'product_id'          =>     $_POST["product_id"],  
                     'product_name'        =>     $_POST["product_name"],  
                     'product_price'       =>     $_POST["product_price"],  
                     'product_quantity'    =>     $_POST["product_quantity"]  
                );  
                $_SESSION[$shoppingrest][] = $item_array;  
           }  
      } 


      if($_POST["action"] == "remove"){ 

           foreach($_SESSION[$shoppingrest] as $keys => $values)  
           {  

               /*if($_SESSION[$shoppingrest][$keys]['product_id'] == $_POST["product_id"])  
                {  
                     unset($_SESSION[$shoppingrest][$keys]);  
                }*/ 
                //works both ways..
                if($values["product_id"] == $_POST["product_id"])  
                {  
                     unset($_SESSION[$shoppingrest][$keys]);  
                } 
           }  
      }

      if($_POST["action"] == "quantity_change"){  
           foreach($_SESSION[$shoppingrest] as $keys => $values)  
           {  
                /*if($_SESSION[$shoppingrest][$keys]['product_id'] == $_POST["product_id"])  
                {  
                     $_SESSION[$shoppingrest][$keys]['product_quantity'] = $_POST["quantity"];  
                }*/ 
                if($values['product_id'] == $_POST["product_id"])  
                {  
                     $_SESSION[$shoppingrest][$keys]['product_quantity']= $_POST["quantity"];  
                }

           }  
      } 

      $order_table .= '<h2 id="test">Your Plate</h2> <br><hr>   
           <table>  
                <tr>  
                     <th width="40%">Product Name</th>  
                     <th width="10%">Quantity</th>  
                     <th width="20%">Price</th>  
                     <th width="15%">Total</th>  
                     <th width="5%"></th>  
                </tr>  
           ';  
      if(!empty($_SESSION[$shoppingrest]))  
      {  
           $total = 0;  
           foreach($_SESSION[$shoppingrest] as $keys => $values)  
           {  
                $order_table .= '  
                     <tr>  
                          <td>'.$values["product_name"].'</td>
                          <td> <input type="number" min="1" class="quantity" id="qt.'.$values["product_id"].'" value="'.$values["product_quantity"].'"></td> 
                          <td align="right">EGP '.$values["product_price"].'</td>  
                          <td align="right">EGP '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>  
                          <td> <button name="delete" class="deletefromcart" id="'. $values["product_id"].'"></button> </td> 
                     </tr>  ';
                  
                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
           }  
       
           $_SESSION[$shoppingrest.'total']=number_format($total, 2);
           
           $order_table .= '
            
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td align="right">EGP '.number_format($total, 2).'</td>
                     
                     <td></td>  
                </tr>  
                <tr>  
                     <td colspan="5" align="center">    
                     <button type="button" name="place_order" class="placeorder"> <a href="cart.php?'.$cart_url.'"> Place Order </button>  
                     </td>  
                </tr>
                
           ';  
      	}

      $order_table .= '</table>';

    $output = array(  
    	'order_table' => $order_table  
      );    
 echo json_encode($output);   
 }


 ?>