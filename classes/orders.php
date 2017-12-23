<?php 
	require("\..\db\db_connect.php");

class Order{

	public $ID;
	public $Area;
	public $Street;
	public $Building;
	public $UID;
	public $RID;
	public $Date;
	public $TotalPrice;

	private $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
	}


}

?>