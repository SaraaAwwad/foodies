<?php
require_once("../classes/rating.php");
session_start();
header('Content-Type: application/json');

$newtable= '';

if(isset($_POST["rating_id"]))  { 

	$temp = explode("_", $_POST["rating_id"]);
	$reviewid = $temp[0];
	$rest = $temp[1];
	$value= $temp[2]+1;
	$user=$_SESSION["userID"];
	
	if($reviewid==0){
		//insert here in table orders 
		$review = new Review();
		$newid = $review->insertRating($user,$rest,$value);

	}else{
		//update here 
		$review = new Review($reviewid);
		$updated = $review->updateRating($value, $reviewid);
	}

	$output = array(  
    	'newtable' => ""
    );    
 echo json_encode($output);   
}


?>