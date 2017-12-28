<?php 
	require_once("\..\db\db_connect.php");
	
class ProductValue{
	public $Price;
	public $Size;

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

	Static function getAllValue($prodID){
		$dbobj = new dbconnect;
		$sql = "SELECT Price, Size FROM prod_value WHERE ProdID = '$prodID' ";
		$result = $dbobj->selectsql($sql);
		$i=0;
		$values = array();

		while ($row = mysqli_fetch_assoc($result)){
			$values = new ProductValue();
			$values->Price = $row['Price'];
			$values->Size = $row['Size'];
			$prodvalues[$i]= $values;
			$i++;
		}

		return $prodvalues;
	}
}
?>