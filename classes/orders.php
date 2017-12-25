<?php 
	require_once("\..\db\db_connect.php");
	require_once("/restaurant.php");

class Order{

	public $ID;
	public $Area;
	public $Street;
	public $Building;
	public $UserID;
	public $RestID;
	public $DateOrder;
	public $TotalPrice;
	public $AllOrders = array();
	public $rest;
	private $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->rest = new Restaurant();
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

	public function getOrders()
	{
		$sql= "SELECT * FROM orders,restaurant WHERE orders.RestID = restaurant.ID";
		$result = $this->dbobj->selectsql($sql);
		$i=0;
		while ($row = mysqli_fetch_assoc($result)){
			$this->AllOrders[$i] = array();
			$this->AllOrders[$i]['ID'] = $row['ID'];
			$this->AllOrders[$i]['UserID'] = $row['UserID'];
			
			$this->AllOrders[$i]['Name'] = $row['Name'];
			$this->AllOrders[$i]['Area'] = $row['Area'];
			$this->AllOrders[$i]['Street'] = $row['Street'];
			$this->AllOrders[$i]['Building'] = $row['Building'];
			$this->AllOrders[$i]['DateOrder'] = $row['DateOrder'];
			$this->AllOrders[$i]['TotalPrice'] = $row['TotalPrice'];
			$i++;

		}
		return $this->AllOrders;
	}

	// public function getName()
	// {
	// 	$sql = "SELECT restaurant.Name FROM restaurant,orders WHERE orders.RestID = restaurant.ID ";
	// 	$result = $this->dbobj->executesql($sql);
	// 	return $result;
	// }

	}


?>
