<?php 
	require_once("\..\db\db_connect.php");
	
class ProductValue{
	public $price;
	public $size;

	private $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
	}

	public function getValue($prodID){
		$sql = "SELECT Price, Size FROM prod_value WHERE ProdID = '$prodID' ";
		$result = $this->dbobj->selectsql($sql);
		$i=0;
		$values = array();
		while ($row = mysqli_fetch_assoc($result)){
			$values[$i] = array();
			$values[$i]= $row['Price'];
			$values[$i+1] = $row['Size'];
			$i+=2;
		}

	return $values;
	}
}
?>