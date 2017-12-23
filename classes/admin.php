<?php 
	require("\..\db\db_connect.php");
	
	class Admin{

	public $ID;
	public $Email;
	public $Fname;
	public $Lname;
	public $CreationDate;
	public $Image;
	public $LastVisited;
	public $Password;
	public $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
	}

	public function isExist($email){

		$sql = "SELECT * FROM admin Where Email = '$email' ";
		$qresult = $this->dbobj->selectsql($sql);
		if($qresult->num_rows > 0){
			return $qresult;
		}else{
			return false;
		}
	}

	public function login($em, $pw){
		$result = $this->isExist($em);
		if ($result){
			$row = mysqli_fetch_array($result);
			if($pw == $row['Password']) {
				//try to comment it?
				session_start();
				$_SESSION["adminID"] = $row['ID'];
				$_SESSION["adminImage"] = $row['Image'];
				return true;
			}
		}
		
		return false;
	}

public function getSelect($id){
		$sql = "SELECT * FROM admin Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			return $row;
		}
	}
	/* public function updateInfo($id, $fn, $ln, $bld, $st, $ar){

		$fn = $this->dbobj->test_input($fn);
		$ln = $this->dbobj->test_input($ln);
		$bld = $this->dbobj->test_input($bld);
		$st = $this->dbobj->test_input($st);
		$ar = $this->dbobj->test_input($ar);
		
		$sql = "UPDATE user SET FName= '$fn' ,LName='$ln',Area='$ar', Street= '$st', Building='$bld' WHERE UID='$id'";
		$res = $this->dbobj->executesql2($sql);

		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
	}

	public function updatePw($oldpw, $newpw, $id){
		//trim data first
		$old = $this->dbobj->test_input($oldpw);
		$new = $this->dbobj->test_input($newpw);
		$storePw = password_hash($new, PASSWORD_BCRYPT, array('cost'=>8));

		if(!password_verify($old, $this->Password)){
			return false;
		}

		$sql = "UPDATE user SET Password = '$storePw' WHERE UID='$id' ";
		$res = $this->dbobj->executesql($sql);

		if($res){
			$this->getInfo($id);
			return true;
		}else{
			return false;
		}
			
	} */

	public function getInfo($id){

		$sql = "SELECT * FROM admin Where ID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->Fname = $row['FName'];
			$this->Lname = $row['LName'];
			$this->Email = $row['Email'];
			$this->CreationDate = $row['CreationDate'];
			$this->Image = $row['Image'];
			$this->LastVisited = $row['LastVisited'];
			$this->Password = $row['Password'];
		}
	}
}

?>