<?php 

require_once("\..\db\db_connect.php");

class Cuisine{

	public $type = array();
	public $restID = array();

    private $dbobj;
    
	public function __construct(){
		$this->dbobj = new dbconnect;
	}

	public function getcuisine($id){
		$sql = "SELECT * FROM cuisine Where RestID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			return $row;
        }
	}

	public function updateInfo2($id,$type){
		$type = $this->dbobj->test_input($type);
		$sql = "UPDATE cuisine SET Type= '$type' WHERE RestID='$id'";
		$res = $this->dbobj->executesql2($sql);
		if($res){
			$this->getInfo2($id);
			return true;
		}else{
			return false;
		}
	}

    public function getInfo2($id){
		$sql = "SELECT * FROM cuisine Where RestID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->RestID = $row['RestID'];
			$this->Type = $row['Type'];
		}
	}


	public function getType($restID){
		$sql = "SELECT Type from cuisine WHERE RestID = $restID";
		
		$result = $this->dbobj->selectsql($sql);

		$i=0;
		$type = array();
	
		while ($row = mysqli_fetch_assoc($result)){
			$type[$i] = $row['Type'];
			$i++;
		}

	return $type;
	}

}

?>
