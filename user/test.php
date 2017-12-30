<?php

// If you are using Composer (recommended)
//require 'vendor/autoload.php';
// If you are not using Composer

/*grequire("../sendgrid-php/sendgrid-php.php");
require("credentials.php");

$from = new SendGrid\Email("Foodies", "orders@foodies.com");
$subject = "Order Confirmation";

$toemail="farahhisham@hotmail.com";
$to = new SendGrid\Email("Example User", $toemail);

$insidecontent = "sara";

$content = new SendGrid\Content("text/plain", "Hey, sorry if you received any email from us by mistake");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$sg = new \SendGrid($API_KEY);
$response = $sg->client->mail()->send()->post($mail);

echo $response->statusCode();

echo $response->body();
*/
session_start();

			$second = array(
									'product_id'         =>     "1",  
			                        'product_name'       =>     "2",  
			                        'product_price'      =>     "3",  
			                        'product_quantity'   =>     "4"  
			);
			//if(isset($_SESSION["first"])){}else{
		$_SESSION["first"][]=$second;//}
		
		foreach($_SESSION["first"] as $keys => $values)  
           {   
           			/*if ($_SESSION["first"][$keys]['product_name']==2){
           				echo'yes-';
           			}*/
           	 if($_SESSION["first"][$keys]['product_id'] == "1")  
                {  
                     unset($_SESSION["first"][$keys]);  
         
                } 
           		//echo "end of value";
           		echo $_SESSION["first"][$keys]['product_name'];

           		/*if($values["product_id"] == $_POST["product_id"])  
                {  
                     unset($_SESSION[$shoppingrest][$keys]);  
         
                } */
           }  
               

?>