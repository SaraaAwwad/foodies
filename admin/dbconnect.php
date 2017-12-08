<?php 
class dbconnect{
	private $servername;
	private $username;
	private $password;
	private $db;
	private $con;
	
	function __construct(){
		$this->servername = "localhost";
		$this->username = "root";
		$this->password="";
		$this->db = "foodies";
		$this->con = $this->Connect();
	}
	
	function connect(){
		$this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
		if($this->con->connect_error){
			die("Failed to connect: " .$this->con->connect_error);
	}
	else{
		return $this->con;
	}
	}
	function disconnect(){
		return $this->$con->close();
	}
	function executesql($sql){
		if($this->con->query($sql) == TRUE){
			return $result = mysqli_query($this->con,$sql);
		}
		else{
			echo "Error Executing: " .$this->con->error;
		}
}
function executesqlto($sql){
		$this->con->query($sql);
		return $result = mysqli_query($this->con,$sql);
	
}
}
?>