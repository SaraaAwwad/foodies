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

    public function getCount(){
      $sql="SELECT ID FROM orders WHERE DateOrder = date(CURRENT_TIMESTAMP)";
	  $result=$this->dbobj->selectsql2($sql);
      return $result;
	}

	public function getallCount(){
	  $sql="SELECT ID FROM orders WHERE DateOrder < date(CURRENT_TIMESTAMP)";
	  $result=$this->dbobj->selectsql2($sql);
      return $result;
	}

}

?>
