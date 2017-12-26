<?php
	require_once("\..\db\db_connect.php");

	Class OrderDetails{
		private $dbobj;
		public $ID;
		public $ProdName;
		public $Price;
		public $Quantity;

		public function __construct(){
		$this->dbobj = new dbconnect;
		}

		public function addorderitem($ordid, $prod, $price, $quantity){
		$sql = "INSERT INTO order_item(OrderID, ProdName, Price, Quantity) VALUES ('$ordid','$prod','$price','$quantity')";
		$qresult = $this->dbobj->executesql($sql);
		return $qresult;
		}

		public function getOrderItemById($OID){
			$sql = "SELECT * FROM order_item WHERE OrderID = '$OID'";
			$res = $this->dbobj->selectsql($sql);

			if($res){
				$i=0;
				$getItems= array();

				while ($row = mysqli_fetch_assoc($res)){
					$getItems[$i] = array();
					$getItems[$i]['ProdName'] = $row['ProdName'];
					$getItems[$i]['Price'] = $row['Price'];
					$getItems[$i]['Quantity'] = $row['Quantity'];
					$i++;
				}
			
				return $getItems;
			}
	
			return false;
		}
		
}
?>