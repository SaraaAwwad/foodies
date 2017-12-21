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

	public $dbobj;

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
				/*$_SESSION["userFN"] = $row[FName];
				$_SESSION["userLN"] = $row[LName];
				$_SESSION["userAREA"] = $row[Area];
				$_SESSION["userSTREET"] = $row[Street];
				$_SESSION["userBUILDING"] = $row[Building];*/
				return true;
			}
		}
		
		return false;
	}

	public function update(){

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
		}
	}
}

?>