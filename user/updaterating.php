<?php
require_once("../classes/rating.php");
session_start();
header('Content-Type: application/json');

$newtable = '';

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
		
		if($newid){
			$newtable .= '<div id="table'.$newid.'_'.$rest.'">';

				for($i=0; $i<$value; $i++){
					$newtable .= '<div class="star ratings_stars" id="'.$newid.'_'.$rest.'_'.$i.'""></div>';
				}

				for($i; $i<5; $i++){
					$newtable .= '<div class="star ratings_vote" id="'.$newid.'_'.$rest.'_'.$i.'""></div>';
				}
			$newtable .= '</div>';	
		}

		
	}else{
		//update here 
		$review = new Review($reviewid);
		$updated = $review->updateRating($value, $reviewid);
		//$newtable .="sara";

		if($updated){
			$newtable .= '<div id="table'.$reviewid.'_'.$rest.'">';
				for($i=0; $i<$value; $i++){
					$newtable .= '<div class="star ratings_stars" id="'.$reviewid.'_'.$rest.'_'.$i.'""></div>';
				}
				for($i; $i<5; $i++){
					$newtable .= '<div class="star ratings_vote" id="'.$reviewid.'_'.$rest.'_'.$i.'""></div>';
				}
			$newtable .= '</div>';
		}

	}

	$output = array(  
    	'newtable' => $newtable
    );    
 echo json_encode($output);   
}


?>