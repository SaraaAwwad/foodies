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
		$this->password = "";
		$this->db = "foodies";
		$this->con = $this->connect();
	}

	function connect(){
		$this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->db);

		if($this->con->connect_error){
			die("Failed to connect" .$this->con->connect_error);
		}else{
			return $this->con;
		}
	}

	 function executesql($sql){
		if($this->con->query($sql) === TRUE){
			//$result = mysqli_query($this->con, $sql);
			return true;
		}else{
		   echo "Error: ". $this->con->error;
			return false;
		}
	}
	function executesql2($sql){
		if($this->con->query($sql) == TRUE){
			return $result = mysqli_query($this->con,$sql);
		}else{
		   echo "Error: ". $this->con->error;
			return false;
		}
	}

	function selectsql($sql){
		
		$result = mysqli_query($this->con, $sql);
		return $result;
	}

	function update($table,$id,$k,$l,$m,$f){
   		mysqli_query($this->con,"update $table set Name='$k', Hotline='$l',DelvFees='$m',DelvTime='$f' where ID =".$id);
  	}	
  
	function disconnect(){
		return $this->con->close();
	}

	
}
?>