<?php 
class dbconnect {
	

	public $link;

	public $host 	 = "localhost";
	public $username = "root";
	public $password = "";
	public $database = "foodies2"; 

	function __construct(){
		global $connection;
		$this->link = new mysqli( $this->host, $this->username, $this->password, $this->database );
	}

	public function __destruct() {

		$this->disconnect();

	}

	public function query($query) {

		$result = mysqli_query($query, $this->link) or die ("Invalid query: " . mysqli_error());
		return $result;
		$this->disconnect();

	}

	public function fetch($query) {

	 	$data = array();
		$result = $this->link->query($query);
			while($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}

	  	return $data;
	  	$this->disconnect();
	  	
	}
	
	public function add_rest($Name, $hotline, $fees, $time, $image, $admin){

				$this->link->query("INSERT INTO `restaurant` SET Name = '$Name', Hotline = '$hotline', DelvFees = '$fees', DelvTime = '$time', Image = '$image', AdminID = '$admin'");
	}

	public function add_cuisine($RID, $type){

				$this->link->query("INSERT INTO cuisine (RestID,Type)
				 VALUES ('$RID', '$type')");
	}

	public function add_area($RID, $AID){

				$this->link->query("INSERT INTO rest_area (RID,AID)
				  VALUES ('$RID', '$AID')");
	}


	public function SelectMaxID($_TableName) {
	 $result = mysqli_query($this->link,"SELECT MAX(ID) FROM ".$_TableName);
	 $row1 = mysqli_fetch_array($result);
	 return $row1[0];
    }



    public function SelectAll($_TableName) {
        $data = $this->fetch("SELECT * FROM ".$_TableName);
			return $data;
    }



  	public function disconnect() {

		$this->link->close();

	}
}
?>