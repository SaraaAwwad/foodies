<?php 
	require_once("\..\db\db_connect.php");
	
	class Restaurant{
	public $ID;
	public $Name;
	public $Hotline;
	public $DelvFees;
	public $DelvTime;
	public $Image;
	public $AdminID;
	public $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
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

}

?>