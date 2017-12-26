<?php 
require_once("\..\db\db_connect.php");
require_once("\cuisine.php");
require_once("\areas.php");
require_once("\orders.php");

class Restaurant{

	public $ID;
	public $Name;
	public $Hotline;
	public $DelvFees;
	public $DelvTime;
	public $Image;
	public $AdminID;
	public $Status;
	public $RestByArea = array();
	public $type = array();
	public $cuisine;
	public $areas;
	public $RestByRestID = array();
	public $Areas = array();
	private $dbobj;
    public $GetS = array();

	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->cuisine = new Cuisine();
		$this->areas = new Area();
	}


	public function getallCount(){
	  $sql="SELECT ID FROM restaurant";
	  $result=$this->dbobj->selectsql2($sql);
      return $result;
	}

	public function updateInfo($id, $name, $hot, $fees, $time, $image,$adminid){
		$name = $this->dbobj->test_input($name);
		$hot = $this->dbobj->test_input($hot);
		$fees = $this->dbobj->test_input($fees);
		$time = $this->dbobj->test_input($time);
		$image = $this->dbobj->test_input($image);

		$sql = "UPDATE restaurant SET Name= '$name' , Hotline='$hot', DelvFees='$fees', DelvTime= '$time', Image='$image' WHERE ID='$id'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
	}

	public function insertInfo($name, $hot, $fees, $time, $image,$adminid,$status){
		$name = $this->dbobj->test_input($name);
		$hot = $this->dbobj->test_input($hot);
		$fees = $this->dbobj->test_input($fees);
		$time = $this->dbobj->test_input($time);
		$image = $this->dbobj->test_input($image);

		$sql = "INSERT INTO restaurant (Name, Hotline, DelvFees, DelvTime, Image, AdminID, Status) VALUES ('$name', '$hot' , '$fees', '$time', '$image', '$adminid', '$status')";
		$result = $this->dbobj->insertsql($sql);
		return $result;
	}


	public function getInfo($id){
		$sql = "SELECT * FROM restaurant Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->ID = $row['ID'];
			$this->Name = $row['Name'];
			$this->Hotline = $row['Hotline'];
			$this->DelvFees = $row['DelvFees'];
			$this->DelvTime = $row['DelvTime'];
			$this->Image = $row['Image'];
			$this->AdminID = $row['AdminID'];
			$this->Status = $row['Status'];
		}
	}

    public function getstatus($id){
		$sql = "SELECT Status FROM restaurant Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		while ($row = mysqli_fetch_assoc($userinfo)){
			$this->GetS = array();
			$this->GetS['Status'] = $row['Status'];
		}
		return $this->GetS;
	}

    public function changetoactive($status,$id){
		$sql = "UPDATE restaurant SET Status= '$status' WHERE ID='$id'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
	}

    public function getRestaurants(){
		$sql = "SELECT * FROM restaurant";
		$result = $this->dbobj->selectsql($sql);
		$i=0;
		while ($row = mysqli_fetch_assoc($result)){
			$this->RestByRestID[$i] = array();
			$this->type[$i] = array();
			$this->Areas[$i] = array();
			$this->RestByRestID[$i]['ID'] = $row['ID'];
			$this->type[$i] = $this->cuisine->getType($row['ID']);
			$this->Areas[$i] = $this->areas->getType($row['ID']);
			$this->RestByRestID[$i]['Image'] = $row['Image'];
			$this->RestByRestID[$i]['Name'] = $row['Name'];
			$this->RestByRestID[$i]['Hotline'] = $row['Hotline'];
			$this->RestByRestID[$i]['DelvFees'] = $row['DelvFees'];
			$this->RestByRestID[$i]['DelvTime'] = $row['DelvTime'];
			$this->RestByRestID[$i]['Status'] = $row['Status'];
			$i++;
		}
		return $this->RestByRestID;
	}

	public function getSelect($id){
		$sql = "SELECT * FROM restaurant Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			return $row;
		}
	}

    public function getAllSelect(){
		$sql = "SELECT * FROM restaurant";
		$userinfo = $this->dbobj->selectsql($sql);
		return $userinfo;
	}

	public function DeleteRest($id){
		$sql = "Delete FROM restaurant WHERE ID = '$id'";
		$userinfo = $this->dbobj->executesql($sql);
		return $userinfo;
	}
	

	public function InsertRest($name, $cuisine, $delvarea, $hotline, $area, $street, $building, $img){
		$sql = "INSERT INTO user (Password, Email, FName, LName, Area, Street, Building) VALUES ('$password', '$email' , '$fname', '$lname', '$area', '$street', '$building')";

		$qresult = $this->dbobj->executesql($sql);

		return $qresult;
	}

	public function getByArea($ar){
		$sql="SELECT restaurant.ID, restaurant.Name, restaurant.Hotline, restaurant.DelvTime, restaurant.DelvFees, restaurant.Image FROM restaurant INNER JOIN areas ON areas.RestID = restaurant.ID Where restaurant.Status = 1 AND areas.Area= '$ar' ";
		$result = $this->dbobj->selectsql($sql);
		$i=0;
		while ($row = mysqli_fetch_assoc($result)){
			$this->RestByArea[$i] = array();
			$this->type[$i] = array();

			$this->RestByArea[$i]['ID'] = $row['ID'];
			$this->type[$i] = $this->cuisine->getType($row['ID']);

			$this->RestByArea[$i]['Name'] = $row['Name'];
			$this->RestByArea[$i]['Hotline'] = $row['Hotline'];
			$this->RestByArea[$i]['DelvTime'] = $row['DelvTime'];
			$this->RestByArea[$i]['DelvFees'] = $row['DelvFees'];
			$this->RestByArea[$i]['Image'] = $row['Image'];
			$i++;
		}
		return $this->RestByArea;
	}

	public function getName($rid){
		$sql = "SELECT Name from restaurant Where ID = '$rid' ";
		$result = $this->dbobj->selectsql($sql);

		if($result){
			$row = mysqli_fetch_array($result);
			$this->Name= $row['Name'];
		}
	return $this->Name;
	}

}

?>
