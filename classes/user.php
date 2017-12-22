<?php 
	require("\..\db\db_connect.php");
	
	class User{

	public $ID;
	public $Email;
	public $FirstName;
	public $LastName;
	public $Area;
	public $Street;
	public $Building;
	public $Password;
	
	private $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
	}

	public function signup($password, $email, $fname, $lname, $area, $street, $building, $img){
		$sql = "INSERT INTO user (Password, Email, FName, LName, Area, Street, Building) VALUES ('$password', '$email' , '$fname', '$lname', '$area', '$street', '$building')";

		$qresult = $this->dbobj->executesql($sql);

		return $qresult;
	}

	public function isExist($email){

		$sql = "SELECT * FROM user Where Email = '$email' ";
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

			if(password_verify($pw, $row['Password'])){
				//try to comment it?
				session_start();
				$_SESSION["userID"] = $row['UID'];
				return true;
			}
		}
		
		return false;
	}

	public function updateInfo($id, $fn, $ln, $bld, $st, $ar){

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
			
	}

	public function getInfo($id){

		$sql = "SELECT * FROM user Where UID = '$id' ";
		$userinfo = $this->dbobj->selectsql($sql);
		if($userinfo){
			$row = mysqli_fetch_array($userinfo);
			$this->FirstName = $row['FName'];
			$this->LastName = $row['LName'];
			$this->Email = $row['Email'];
			$this->Area = $row['Area'];
			$this->Street = $row['Street'];
			$this->Building = $row['Building'];
			$this->Password = $row['Password'];
		}
	}
}

?>