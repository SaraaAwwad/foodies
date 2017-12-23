<?php 

require_once("\..\db\db_connect.php");

class Cuisine{

	public $type = array();
	public $restID = array();

	public function __construct(){
		$this->dbobj = new dbconnect;
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