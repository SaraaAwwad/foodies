<?php
	require_once("\..\db\db_connect.php");
	require_once("restaurant.php");
	require_once("user.php");

	Class Review{
		public $ID;
		public $Rating;
		public $UserID;
		public $RestID;

		private $dbobj;

		public function __construct($userid="", $restid=""){
		$this->dbobj = new dbconnect;
		if($userid!="" && $restid!=""){
			$this->UserID= $userid;
			$this->RestID= $restid;
			$this->getInfo($userid, $restid);
			}
		}

		public function getInfo($userid, $restid){
			$sql = "SELECT ID, Rating from reviews WHERE UserID ='$this->UserID' AND RestID= '$this->RestID' ";
			$rateinfo = $this->dbobj->selectsql($sql);
			if($rateinfo->num_rows > 0){
				$row = mysqli_fetch_array($rateinfo);
				$this->ID = $row['ID'];
				$this->Rating = $row['Rating'];
			}else{
				$this->ID=0;
				$this->Rating=0;
			}
	}

	public function insertRating($uid, $rid, $rating){
		$sql = "INSERT INTO reviews (Rating, UserID, RestID) VALUES ('$rating', '$uid' , '$rid')";
		$result = $this->dbobj->insertsql($sql);
		return $result;
	}

	public function updateRating($rating, $id){
		$sql = "UPDATE reviews SET Rating = '$rating' WHERE ID = '$id' ";
		$res = $this->dbobj->executesql2($sql);

		if($res){
			$this->Rating = $rating;
			return true;
		}else{
			return false;
		}

	}

}
?>