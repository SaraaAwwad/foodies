<?php 
	require_once("\..\db\db_connect.php");
	require_once("restaurant.php");
class Order{

	public $ID;
	public $Area;
	public $Street;
	public $Building;
	public $UID;
	public $RID;
	public $Date;
	public $TotalPrice;

	public $getDates = array();
	public $getOrders = array();
	
	public $restaurant;
	private $dbobj;


	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->restaurant = new Restaurant();
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

		$sql = "SELECT DISTINCT DateOrder FROM orders WHERE UserID= '$uid' ";
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

		$sql = "SELECT * from orders WHERE DateOrder = '$dte' AND UserID='$uid' ";
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

}

?>
