<?php 
	require_once("\..\db\db_connect.php");
	
	class Area{

	public $RestID;
	public $Area;
	public $dbobj;
	public $type = array();

	public function __construct(){
		$this->dbobj = new dbconnect;
	}


public function getType($restID){
		$sql = "SELECT Area from areas WHERE RestID = $restID";		
		$result = $this->dbobj->selectsql($sql);
		$i=0;
		$type = array();
		while ($row = mysqli_fetch_assoc($result)){
			$type[$i] = $row['Area'];
			$i++;
		}
	return $type;
	}

	public function delArea($id){
        $sql2 = "DELETE FROM areas WHERE RestID ='$id'";
		$this->dbobj->executesql2($sql2);
	}

	public function updateArea($id,$selectedOption){
         $sql = "INSERT INTO areas (RestID, Area) VALUES ('$id', '$selectedOption')";
		 $this->dbobj->executesql2($sql);
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

public function getRestAreas($restID){
		$sql = "SELECT DISTINCT Area from areas WHERE restID= '$restID'";
		$res = $this->dbobj->selectsql($sql);
		$areas= array();

		if($res){
			while($row = mysqli_fetch_array($res)){
				$areas[] = $row['Area']; 
			}
		}
		return $areas;
	}

	public function getAllAreas(){
		$sql = "SELECT DISTINCT Area from areas";
		$res = $this->dbobj->selectsql($sql);
		
		$areas= array();
		if($res){
			while($row = mysqli_fetch_assoc($res)){
				$areas[] = $row['Area']; 
			}
		}
		return $areas;	
	}
	
}
?>