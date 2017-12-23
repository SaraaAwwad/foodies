<?php 
	require_once("\..\db\db_connect.php");
	
	class Area{

	public $RestID;
	public $Area;
	public $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
	}



	public function getarea($id){
		$sql = "SELECT * FROM areas Where RestID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			return $row;
        }
	}

    public function getareaAll($id){
		$sql = "SELECT * FROM areas Where RestID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		return $userinfo;
	}
	public function updateInfo3($id,$area){
		$area = $this->dbobj->test_input($area);
		$sql = "UPDATE areas SET Area= '$area' WHERE RestID='$id'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo2($id);
			return true;
		}else{
			return false;
		}
	}

    public function getInfo3($id){
		$sql = "SELECT * FROM areas Where RestID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->RestID = $row['RestID'];
			$this->Area = $row['Area'];
		}
	}


	
}

?>