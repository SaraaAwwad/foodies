<?php 
	require_once("\..\db\db_connect.php");
	require_once("productvalue.php");

class Product{

	public $ID;
	public $Name;
	public $Description;
	//public $DelvFees;
	public $Status;
	//public $Category;
	public $RestID;
	public $values = array();
	private $ProdVal;
	private $dbobj;
	public $ProdByRestID = array();

	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->ProdVal = new ProductValue;
	}

	public function getProduct($restID){
		$sql = "SELECT * FROM products Where RestID = '$restID' AND Status = 1 ";
		$result = $this->dbobj->selectsql($sql);
		
		$i=0;

		while ($row = mysqli_fetch_assoc($result)){
			$this->ProdByRestID[$i] = array();
			$this->values[$i] = array();

			$this->ProdByRestID[$i]['ID'] = $row['ID'];
			$this->values[$i] = $this->ProdVal->getValue($row['ID']);

			$this->ProdByRestID[$i]['Image'] = $row['Image'];
			$this->ProdByRestID[$i]['Name'] = $row['Name'];
			$this->ProdByRestID[$i]['Description'] = $row['Description'];

			$i++;
		}

		return $this->ProdByRestID;
	}

}
?>
