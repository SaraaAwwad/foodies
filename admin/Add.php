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
		
		//drop down
	// 	<option value="Ffth" id="Fifth">Fifth Settlement</option>
	// <option value="Mdi" id="Maadi">Maadi</option>
	// <option value="Nsr" id="Nasr">Nasr City</option>
	// <option value="Hlp" id="Helio">Heliopolis</option>
	// <option value="Sher" id="Sheraton">Sheraton</option>
	// <option value="Rh" id="Rehab">Rehab</option>
	// <option value="Oct" id="October">6 October</option>
	// <option value="Dki" id="Dokki">Dokki</option>
	// <option value="Obo" id="Obour">Obour</option>
	// <option value="Mok" id="Mokattam">Mokattam</option>
		
		?
		#attribute in table cuisine
		$r_cuisine = trim($_POST['Type']);

		#attribute in table areas
		$a_area = trim($_POST['Area']);

		$db_obj->add_rest($r_name,$r_hotline,$r_delvfees,$r_delvtime,$r_img,$r_adminid);

		$a_id = $db_obj->SelectMaxID('restaurant');

		$db_obj->add_cuisine($a_id,$r_cuisine);

		$db_obj->add_area($a_id,$a_area);



	// 	if (isset($_POST["saver"]){

	// 	$addrest= $_POST['restarea'];

	// 	for($i=0; $i<count($addrest); $i++){
	// 	//echo $p_name[$i].'<br/>';

	// 	//mysql_query("INSERT INTO rest_area(addrest)VALUES ('$addrest[$i]') or die(mysql_error()") ;

	// 	$db_obj->add_area();

	// 	}
	// }




		// function add()
		// {
		// 	if(isset($_POST['restarea'])){

		// 		//for the multiple select
		// 		$restareas = $_POST['restarea'];
		// 	}

		// 	$nareas = count($restareas);

		// 	for ($i=0; i<$nareas; i++)
		// 	{
		// 		$db_obj->add_cuisine($a_id,$r_cuisine);

		// 		$db_obj->add_area($a_id,$a_area);
		// 	}
		// }


		$db_obj->disconnect();

		header("Location: newrestaurant.php");

		
				
?>