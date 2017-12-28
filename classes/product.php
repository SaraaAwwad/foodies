<?php 
	require_once("\..\db\db_connect.php");
	require_once("productvalue.php");

class Product{

	public $ID;
	public $Name;
	public $Description;
	public $Status;
	public $Image;
	public $Category;
	public $RestID;
	public $values;
	private $ProdVal;
	private $dbobj;
	public $ProdByRestID = array();
	public $ProdByProdID = array();
	public $GetS = array();


    public function __construct($id=""){
		$this->dbobj = new dbconnect;
		$this->ProdVal = new ProductValue;
		if($id!=""){
			$this->getInfo($id);
		}
	}

	Static function getallCount(){
	  $dbobj = new dbconnect;
	  $sql="SELECT ID FROM products";
	  $result=$dbobj->selectsql2($sql);
      return $result;
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
			$this->values = array();
		}
	}

	public function updateInfo($id,$name,$des,$cat,$image){
		$sql = "UPDATE products SET Name= '$name' , Description='$des', Category='$cat', Image = '$image' WHERE ID='$id'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
	}

    public function updateInfoWithoutImage($id,$name,$des,$cat){
		$sql = "UPDATE products SET Name= '$name' , Description='$des', Category='$cat' WHERE ID='$id'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
	}

	public function InsertInfo($aname,$bdes,$ccat,$dimage,$estatus,$frest){
		$sql = "INSERT INTO products (Name, Description, Image, Category, Status, RestID) VALUES ('$aname', '$bdes' , '$dimage', '$ccat', '$estatus', '$frest')";
		$result = $this->dbobj->insertsql($sql);
		return $result;
	}

    public function changetoactive($status){
		$sql = "UPDATE products SET Status= '$status' WHERE ID='$this->ID'";
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

	Static function getProduct($restID){
		//active products

		$dbobj= new dbconnect;
		//$ProdVal = new ProductValue;

		$sql = "SELECT * FROM products Where RestID = '$restID' AND Status = 1 ";
		$result = $dbobj->selectsql($sql);
		$Prods= array();

		$i=0;

		while ($row = mysqli_fetch_assoc($result)){
			$ProdObj = new Product($row['ID']);
			$ProdObj->val = array();
			$ProdObj->val = ProductValue::getAllValue($row['ID']);
			$Prods[$i] = $ProdObj;
			$i++;
		}
		return $Prods;
	}

    public function getAllProducts($restID){
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
			$this->ProdByRestID[$i]['Category'] = $row['Category'];
			$i++;
		}
		return $this->ProdByRestID;
	}

	public function getSelectProduct($id){
		$sql = "SELECT * FROM products Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			return $row;
		}
	}

    public function getPValue($id,$size){
		$sql = "SELECT * FROM prod_value Where ProdID = '$id' AND Size = '$size'";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			return $row;
		}
	}

	public function delSmallProducts($id,$size,$sizev){
        $sql2 = "DELETE FROM prod_value WHERE ProdID ='$id' And Size ='$size'";
		$this->dbobj->executesql2($sql2);
		$sql = "INSERT INTO prod_value (ProdID, Price, Size) VALUES ('$id', '$sizev','$size')";
		$this->dbobj->executesql2($sql);
	} 

	public function delP($id,$size){
        $sql2 = "DELETE FROM prod_value WHERE ProdID ='$id' And Size ='$size'";
		$this->dbobj->executesql2($sql2);
	    }
    public function InsertPr($id,$size,$sizev){
		$sql = "INSERT INTO prod_value (ProdID, Price, Size) VALUES ('$id', '$sizev','$size')";
		$this->dbobj->executesql2($sql);
	} 

}
?>
