<?php 
require_once('dbconnect.php');


	$db_obj = new dbconnect;


		#attribute in table restaurant
		$r_name = trim($_POST['Name']);
		$r_hotline = trim($_POST['Hotline']);
		$r_delvfees = trim($_POST['DelvFees']);
		$r_delvtime = trim($_POST['DelvTime']);
		$r_img = trim($_POST['Image']);
		$r_adminid = trim($_POST['AdminID']);


		#attribute in table cuisine
		$r_cuisine = trim($_POST['Type']);

		#attribute in table areas
		$a_area = trim($_POST['Area']);

		$db_obj->add_rest($r_name,$r_hotline,$r_delvfees,$r_delvtime,$r_img,$r_adminid);

		$a_id = $db_obj->SelectMaxID('restaurant');

		$db_obj->add_cuisine($a_id,$r_cuisine);

		$db_obj->add_area($a_id,$a_area);

		$db_obj->disconnect();

		header("Location: newrestaurant.php");
		
				
?>