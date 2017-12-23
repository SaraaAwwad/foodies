<?php 

require_once("\..\db\db_connect.php");
require_once("\cuisine.php");
class Restaurant{

	public $ID;
	public $Name;
	public $Hotline;
	public $DelvFees;
	public $DelvTime;
	public $Image;
	public $AdminID;
	public $Status;

	public $RestByArea = array();
	public $type = array();
	public $cuisine; 
	private $dbobj;

	public function __construct(){
		$this->dbobj = new dbconnect;
		$this->cuisine= new Cuisine();
	}

	public function getByArea($ar){
		$sql="SELECT restaurant.ID, restaurant.Name, restaurant.Hotline, restaurant.DelvTime, restaurant.DelvFees, restaurant.Image FROM restaurant INNER JOIN areas ON areas.RestID = restaurant.ID Where restaurant.Status = 1 AND areas.Area= '$ar' ";

			//$sql = "SELECT restaurant.ID, restaurant.Name, restaurant.Hotline, restaurant.DelvTime, restaurant.DelvTime, restaurant.Image FROM restaurant INNER JOIN areas ON areas.RestID = restaurant.ID INNER JOIN reviews ON reviews.RestID = restaurant.ID Where restaurant.Status = 1 AND areas.Area= '$ar' ";
		
		$result = $this->dbobj->selectsql($sql);
		
		$i=0;

		while ($row = mysqli_fetch_assoc($result)){
			$this->RestByArea[$i] = array();
			$this->type[$i] = array();

			$this->RestByArea[$i]['ID'] = $row['ID'];
			$this->type[$i] = $this->cuisine->getType($row['ID']);

			$this->RestByArea[$i]['Name'] = $row['Name'];
			$this->RestByArea[$i]['Hotline'] = $row['Hotline'];
			$this->RestByArea[$i]['DelvTime'] = $row['DelvTime'];
			$this->RestByArea[$i]['DelvFees'] = $row['DelvFees'];
			$this->RestByArea[$i]['Image'] = $row['Image'];
			$i++;
		}
		return $this->RestByArea;
	}

}


?>