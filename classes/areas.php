<?php

require("\..\db\db_connect.php");

class Area{

	//public $ID;
	//public $areas = array();

	private $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
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