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
	public $ProdByProdID = array();
	public $GetS = array();

	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->ProdVal = new ProductValue;
	}


public function getallCount(){
	  $sql="SELECT ID FROM products";
	  $result=$this->dbobj->selectsql2($sql);
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
		}
	}

	public function updateInfo($id,$name,$des,$cat,$image){
		/* $name = $this->dbobj->test_input($name);
		$hot = $this->dbobj->test_input($des);
		$fees = $this->dbobj->test_input($cat);
		$image = $this->dbobj->test_input($image); */

		$sql = "UPDATE products SET Name= '$name' , Description='$des', Category='$cat', Image = '$image' WHERE ID='$id'";
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
