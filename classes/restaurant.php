<?php 

require_once("\..\db\db_connect.php");
require_once("\cuisine.php");
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
	
	private $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->cuisine= new Cuisine();
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
		}
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
	

	public function getByArea($ar){
		$sql="SELECT restaurant.ID, restaurant.Name, restaurant.Hotline, restaurant.DelvTime, restaurant.DelvFees, restaurant.Image FROM restaurant INNER JOIN areas ON areas.RestID = restaurant.ID Where restaurant.Status = 1 AND areas.Area= '$ar' ";

			//$sql = "SELECT restaurant.ID, restaurant.Name, restaurant.Hotline, restaurant.DelvTime, restaurant.DelvTime, restaurant.Image FROM restaurant INNER JOIN areas ON areas.RestID = restaurant.ID INNER JOIN reviews ON reviews.RestID = restaurant.ID Where restaurant.Status = 1 AND areas.Area= '$ar' ";
		
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

}

?>
