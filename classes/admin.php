<?php 
	require("\..\db\db_connect.php");
	
	class Admin{

	public $ID;
	private $Email;
	private $FName;
	private $LName;
	private $CreationDate;
	private $Image;
	private $dbobj;

	public function __construct($id=""){
		$this->dbobj = new dbconnect;
		if($id!="")
		{	$this->ID=$id;
			$this->getInfo($id);
		}
	}

	Static function isExist($email){
		$dbobj = new dbconnect;
		$sql = "SELECT * FROM admin Where Email = '$email' ";
		$qresult = $dbobj->selectsql($sql);
		if($qresult->num_rows > 0){
			return $qresult;
		}else{
			return false;
		}
	}

	Static function login($em, $pw){
		$result = self::isExist($em);
		if ($result){
			$row = mysqli_fetch_array($result);
			if($pw == $row['Password']) {
				session_start();
				$_SESSION["adminID"] = $row['ID'];
				$_SESSION["adminImage"] = $row['Image'];
				return true;
			}
		}
		return false;
	}

	public function getInfo($id){

		$sql = "SELECT * FROM admin Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->FName = $row['FName'];
			$this->LName = $row['LName'];
			$this->Email = $row['Email'];
			$this->CreationDate = $row['CreationDate'];
			$this->Image = $row['Image'];
		}
	}

	public function getFName(){
		return $this->FName;
	}

	public function getLName(){
		return $this->LName;
	}

	public function getEmail(){
		return $this->Email;
	}
	
	public function getCreationDate(){
		return $this->CreationDate;
	}

	public function getImage(){
		return $this->Image;
	}
}

?>