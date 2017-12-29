<?php 
session_start();

require ('..\twilio-php-master\Twilio\autoload.php');
require_once("../classes/orders.php");
require_once("../classes/order_details.php");
require_once("../classes/user.php");
require_once("../classes/restaurant.php");
require("../sendgrid-php/sendgrid-php.php");
require("credentials.php");

use Twilio\Rest\Client;

	$order = new Order;
	$orderdetails = new OrderDetails;

if(isset($_SESSION["userID"])){

	$user = new User($_SESSION["userID"]);
	$phonenum = $user->PhoneNum;
	$send = false;
	
	//bec of the free trial.
	if( $phonenum == "+201091279903"){
		$send=true;
	}


if(isset($_POST["Rest"])){

		$place =$_POST['Rest'];
		$restaurant = new Restaurant($place);

		$s = "shoppingcart".$place;
		$sdone = $s."done";

		if(isset($_POST["checkoutbtn"])&& isset($_SESSION[$s])) {
			$ar = $_POST["area"];
			$st = $_POST["street"];
			$bld = $_POST["build"];

			$res = $order->addorder($_SESSION["userID"], $ar, $st, $bld, $_SESSION["total"], $place);

			foreach($_SESSION[$s] as $keys => $values)  
	        {
				$orderdetails->addorderitem($res,$values["product_name"], $values["product_price"], $values["product_quantity"]);
			}
			$added=true;
			
			//to send mail
			
			/**/
			$from = new SendGrid\Email("Foodies", "orders@foodies.com");
			$subject = "Order Confirmation";

			$toemail=$user->Email;
			$toname = $user->FirstName;
			$to = new SendGrid\Email($toname, $toemail);

			$rname = $restaurant->Name;

			$content = new SendGrid\Content("text/plain", "Hey, $toname thank you for ordering from foodies. Your order from $rname is on its way!");
			$mail = new SendGrid\Mail($from, $subject, $to, $content);

			$sg = new \SendGrid($API_KEY);
			$response = $sg->client->mail()->send()->post($mail);
			/**/

			//leave commented...
			/*if($send){
				$sid = 'AC215c06e0ddcbf694c43bb63025a2b58a';
				$token = 'd748e26a74f22794642e51dd857943b6';
				$client = new Client($sid, $token);
				$bodycontent = ''.$user->FirstName.', The order is on its way, Thank u for using foodies.';

				// Use the client to do fun stuff like send text messages!
				$client->messages->create(
				    // the number you'd like to send the message to
				    $phonenum,
				    array(
				        // A Twilio phone number you purchased at twilio.com/console
				        'from' => '+12095022659',
				        // the body of the text message you'd like to send
				        'body' => $bodycontent
				    	)
					); 
			}*/
			//to ensureee validity
			$_SESSION[$sdone]="yes";
			header("Location: orderdone.php?Rest=$place",TRUE,303);
		}else{
			//header("Location: userhome.php",TRUE,303);
			header("Location: orderdone.php?Rest=$place",TRUE,303);
		}
	}
}

?>