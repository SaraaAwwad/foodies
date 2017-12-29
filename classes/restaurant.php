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
    public $Rating;

	public function __construct($id=""){
		$this->dbobj = new dbconnect;
		$this->cuisine = new Cuisine();
		$this->areas = new Area();
		if($id!=""){
			$this->getInfo($id);
		}
	}

	Static function getallCount(){
	  $dbobj = new dbconnect;
	  $sql="SELECT ID FROM restaurant";
	  $result=$dbobj->selectsql2($sql);
      return $result;
	}

	public function updateInfo($name, $hot, $fees, $time, $image,$adminid){
		if($image == ''){
		$sql = "UPDATE restaurant SET Name= '$name' , Hotline='$hot', DelvFees='$fees', DelvTime= '$time' WHERE ID='$this->ID'";
		$res = $this->dbobj->executesql2($sql); }
		else{$sql = "UPDATE restaurant SET Name= '$name' , Hotline='$hot', DelvFees='$fees', DelvTime= '$time', Image='$image' WHERE ID='$this->ID'";
		$res = $this->dbobj->executesql2($sql); }
		if($res){
			return true;
		}else{
			return false;
		}
	}


	public function insertInfo($name, $hot, $fees, $time, $image,$adminid,$status){
		$dbobj = new dbconnect;
		$name = $dbobj->test_input($name);
		$image = $dbobj->test_input($image);
		$sql = "INSERT INTO restaurant (Name, Hotline, DelvFees, DelvTime, Image, AdminID, Status) VALUES ('$name', '$hot' , '$fees', '$time', '$image', '$adminid', '$status')";
		$result = $dbobj->insertsql($sql);
		return $result;
    }

	public function getInfo($id){
		$sql = "SELECT * FROM restaurant Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->ID = $row['ID'];
			$this->Rating = $this->getAvgRating();
			$this->Name = $row['Name'];
			$this->Hotline = $row['Hotline'];
			$this->DelvFees = $row['DelvFees'];
			$this->DelvTime = $row['DelvTime'];
			$this->Image = $row['Image'];
			$this->AdminID = $row['AdminID'];
			$this->Status = $row['Status'];
		}
	}

    public function changetoactive($status){
		$sql = "UPDATE restaurant SET Status= '$status' WHERE ID='$this->ID'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
	}

    Static function getRestaurants(){
    	$dbobj = new dbconnect;
    	$cuisine = new Cuisine;
    	$areas = new Area;

		$sql = "SELECT * FROM restaurant";
		$result = $dbobj->selectsql($sql);
		$i=0;
		$Rests = array();

		while ($row = mysqli_fetch_assoc($result)){

			$RestObj= new Restaurant($row["ID"]);
			$RestObj->type[$i] = $cuisine->getType($row['ID']);
			$RestObj->Areas[$i] = $areas->getType($row['ID']);
			$Rests[$i]=$RestObj;
			$i++;
		}
		return $Rests;
	}

	Static function getByArea($ar){
		$cuisine = new Cuisine;
		$dbobj= new dbconnect;
		$sql="SELECT restaurant.ID, restaurant.Name, restaurant.Hotline, restaurant.DelvTime, restaurant.DelvFees, restaurant.Image FROM restaurant INNER JOIN areas ON areas.RestID = restaurant.ID Where restaurant.Status = 1 AND areas.Area= '$ar' ";
		$result = $dbobj->selectsql($sql);
		$i=0;
		$Rests = array();

		while($row = mysqli_fetch_assoc($result)){
			$RestObj= new Restaurant($row["ID"]);

			$RestObj->type[$i] = array();
			$RestObj->type[$i] = $cuisine->getType($row['ID']);
			$Rests[$i]=$RestObj;
			$i++;
		}
		return $Rests;
	}

	public function getAvgRating(){
		$sql = "SELECT AVG(Rating) FROM reviews WHERE RestID = '$this->ID'";
		$result = $this->dbobj->selectsql($sql);

		if($result){
			$row = mysqli_fetch_array($result);
			return $row['AVG(Rating)'];
		}else{
			return 0;
		}
	}

}

?>
