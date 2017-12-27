<?php 
	require_once("\..\db\db_connect.php");
	require_once("restaurant.php");

class Order{

	public $ID;
	public $Area;
	public $Street;
	public $Building;
	public $UserID;
	public $RestID;
	public $DateOrder;
	public $TotalPrice;

	public $getDates = array();
	public $getOrders = array();

	public $restaurant;
	public $AllOrders = array();
	public $rest;
	private $dbobj;


	public function __construct($id=""){
		$this->dbobj = new dbconnect;
		$this->restaurant = new Restaurant();
		if($id!=""){
			$this->getInfo($id);
		}
	}


	public function addorder($uid, $ar, $st, $bld, $totalprice, $restid){
		$dat = date("Y-m-d");
		$sql = "INSERT INTO orders(UserID, Area, Street, Building, DateOrder, TotalPrice, RestID) VALUES ('$uid','$ar','$st','$bld','$dat','$totalprice','$restid')";
		$qresult = $this->dbobj->insertsql($sql);

		return $qresult;
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

	public function getHistoryDates($uid){

		$sql = "SELECT DISTINCT DateOrder FROM orders WHERE UserID= '$uid' ORDER BY DateOrder DESC ";
		$result = $this->dbobj->selectsql($sql);

		if($result->num_rows > 0){

			$i=0;

			while ($row = mysqli_fetch_assoc($result)){
				$this->getDates[$i] = $row['DateOrder'];
				$i++;
				}
			
			return $this->getDates;	
		}
		return false;
	}


	public function getOrderByDate($dte, $uid){

		$sql = "SELECT * from orders WHERE DateOrder = '$dte' AND UserID='$uid'";
		$res = $this->dbobj->selectsql($sql);

		if($res){

			$i=0;
			
			//unset($this->getOrders);
				$getOrders= array();
			while ($row = mysqli_fetch_assoc($res)){
				$getOrders[$i] = array();
				$getOrders[$i]['ID'] = $row['ID'];
				$getOrders[$i]['RestName'] = $this->restaurant->getName($row['RestID']);
				$getOrders[$i]['TotalPrice'] = $row['TotalPrice'];
				$getOrders[$i]['Area'] = $row['Area'];
				$getOrders[$i]['Street'] = $row['Street'];
				$getOrders[$i]['Building'] = $row['Building'];
				$i++;
			}
		return $getOrders;
		}
	
		return false;
	}



	Static function getOrders() {
		$dbobj = new dbconnect;
		$sql= "SELECT orders.* , restaurant.Name FROM orders, restaurant WHERE orders.RestID = restaurant.ID";
		$result = $dbobj->selectsql($sql);
		$i=0;
		
		$Orders = array();
		
		while ($row = mysqli_fetch_assoc($result)){
			$OrderObj = new Order($row['ID']);
			$OrderObj->RestName = $row['Name'];
			$Orders[$i]= $OrderObj;
			$i++;
		}
		return $Orders;
	}

	public function getInfo($id){
		$sql = "SELECT * FROM orders Where ID = '$id' ";
		$orderinfo = $this->dbobj->selectsql($sql);
		if($orderinfo){
			$row = mysqli_fetch_array($orderinfo);
			$this->ID = $row['ID'];
			$this->Area = $row['Area'];
			$this->Street = $row['Street'];
			$this->Building = $row['Building'];
			$this->UserID = $row['UserID'];
			$this->RestID = $row['RestID'];
			$this->DateOrder = $row['DateOrder'];
			$this->TotalPrice = $row['TotalPrice'];
		}
	}

}



?>
