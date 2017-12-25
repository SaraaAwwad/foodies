<?php 
	require_once("\..\db\db_connect.php");
	require_once("productvalue.php");

class Product{

	public $ID;
	public $Name;
	public $Description;
	//public $DelvFees;
	public $Status;
	public $Image;
	public $Category;
	public $RestID;
	public $values = array();
	private $ProdVal;
	private $dbobj;
	public $ProdByRestID = array();
	public $GetS = array();

	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->ProdVal = new ProductValue;
	}


public function getInfo($id){
		$sql = "SELECT * FROM products Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->ID = $row['ID'];
			$this->Name = $row['Name'];
			$this->Description = $row['Description'];
			$this->Image = $row['Image'];
			$this->Category = $row['Category'];
			$this->Status = $row['Status'];
			$this->RestID = $row['RestID'];
		}
	}

    public function getstatus($id){
		$sql = "SELECT Status,RestID FROM products Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		while ($row = mysqli_fetch_assoc($userinfo)){
			$this->GetS = array();
			$this->GetS['Status'] = $row['Status'];
			$this->GetS['RestID'] = $row['RestID'];
		}
		return $this->GetS;
	}

    public function changetoactive($status,$id){
		$sql = "UPDATE products SET Status= '$status' WHERE ID='$id'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
	}

    public function DeleteProduct($id){
		$sql = "Delete FROM products WHERE ID = '$id'";
		$userinfo = $this->dbobj->executesql($sql);
		return $userinfo;
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

    public function getProduct1($restID){
		$sql = "SELECT * FROM products Where RestID = '$restID'";
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
			$this->ProdByRestID[$i]['Status'] = $row['Status'];
			$i++;
		}
		return $this->ProdByRestID;
	}
	

}
?>
