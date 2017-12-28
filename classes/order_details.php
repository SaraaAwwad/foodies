<?php
	require_once("\..\db\db_connect.php");

	Class OrderDetails{
		private $dbobj;
		public $ID;
		public $ProdName;
		public $Price;
		public $Quantity;

		public function __construct($id=""){
		$this->dbobj = new dbconnect;
		}

		public function addorderitem($ordid, $prod, $price, $quantity){
		$sql = "INSERT INTO order_item(OrderID, ProdName, Price, Quantity) VALUES ('$ordid','$prod','$price','$quantity')";
		$qresult = $this->dbobj->executesql($sql);
		return $qresult;
		}

		Static function getOrderItemById($OID){
			$dbobj = new dbconnect;
			$sql = "SELECT * FROM order_item WHERE OrderID = '$OID'";
			$res = $dbobj->selectsql($sql);

			if($res){
				$i=0;
				$getItems= array();

				while ($row = mysqli_fetch_assoc($res)){
					$ItemObj = new OrderDetails;
					$ItemObj->ProdName = $row['ProdName'];
					$ItemObj->Price = $row['Price'];
					$ItemObj->Quantity = $row['Quantity'];
					$getItems[$i] = $ItemObj;
					$i++;
				}
			
				return $getItems;
			}
	
			return false;
		}
		
}
?>