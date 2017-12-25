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


	public function addorder($uid, $ar, $st, $bld, $totalprice, $restid){
		$dat = date("Y-m-d");
		$sql = "INSERT INTO orders(UserID, Area, Street, Building, DateOrder, TotalPrice, RestID) VALUES ('$uid','$ar','$st','$bld','$dat','$totalprice','$restid')";
		$qresult = $this->dbobj->insertsql($sql);

		return $qresult;
	}

	public function addorderitem($ordid, $prod, $price, $quantity){
		$sql = "INSERT INTO order_item(OrderID, ProdName, Price, Quantity) VALUES ('$ordid','$prod','$price','$quantity')";
		$qresult = $this->dbobj->executesql($sql);
		return $qresult;

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
