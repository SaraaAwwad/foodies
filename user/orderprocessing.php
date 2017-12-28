<?php 
session_start();

require ('..\twilio-php-master\Twilio\autoload.php');
require("../classes/orders.php");
require("../classes/order_details.php");
require("../classes/user.php");

use Twilio\Rest\Client;

	$order = new Order;
	$orderdetails = new OrderDetails;

	$user = new User($_SESSION["userID"]);
	$phonenum = $user->PhoneNum;
	$send = false;
	
	//bec of the free trial.
	if( $phonenum == "+201091279903"){
		$send=true;
	}


if(isset($_POST["Rest"])){

		$place =$_POST['Rest'];

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


?>