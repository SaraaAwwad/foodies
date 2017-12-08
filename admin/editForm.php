<?php
require ("dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
<title> Add </title>
<link rel="stylesheet" type="text/css" href="../css/topnav.css">
<link rel="stylesheet" type="text/css" href="../css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
<?php 
$db_obj = new dbconnect;
$sql = "SELECT ID, Name, Hotline, DelvFees, DelvTime, Image, AdminID FROM restaurant";
$qresult = $db_obj->executesql($sql);
?>
<header>
		<nav class="menu">
			<ul>
				<li class="logo"> <a href= "AdminPage.php" class="log"> Foo<span class="org">d</span>ies </a></li>
        		<li><a href="../adminlogin.html">Logout</a></li>
			</ul>
			</nav>
</header>

<div class="sidenav" id="mysidenav" >
<img class="bk2" src="../css/images/HS.jpg" alt="profile picture">
<hr id="sidenavhr"> 

<a href="profile.php" class="sidenavitems item"><i class="fa fa-user-circle-o"></i> Profile</a>
<a href="teammembers.php" class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-glass"></i> Restaurants</button>
<div class="panel" style="margin-bottom:0px" id ="paneltoggle" >
  <a href="addrestaurant.php" class="sidenavitems PanelItem"><i class="	fa fa-user-plus"></i> Manage </a>
 <a href="viewrest.php" class="sidenavitems PanelItem"><i class="fa fa-reorder"></i> View </a>
</div>
<a href="statistics.php" class="sidenavitems item"><i class="fa fa-line-chart"></i> Statistics</a>
</div>

<script type="text/javascript" src="js/AdminPage.js"></script>

<div class="main2" >
<div class="container" id="showcase">
    <h1 id="con">New Restaurant</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Restaurants</li>
  <li>Manage</li>
  <li>New Restaurant</li>
</ul>
<?php 
		$id = $_GET['id'];
		if($qresult->num_rows>0){
		while($row = mysqli_fetch_array($qresult)){ 
		if($row['ID'] == $id){
		?>
		
<form action="addrestaurant.php" method="post">
<b style="color: green;">Name</b>
<br>
<input type="text" name="namearea" id="namearea" value="<?php echo $row['Name']; ?>" >
<br>
<b style="color: green;">Hotline</b>
<br>
<input type="text" name="hotarea"  id="hotarea" value="<?php echo $row['Hotline']; ?>">
<br>
<b style="color: green;">Delivery Fees</b>
<br>
<input type="text" name="feesarea" id="feesarea" value="<?php echo $row['DelvFees'];?>">
<br>
<b style="color: green;">Delivery Time</b>
<br>
<input type="text" name="timearea" id="timearea" value="<?php echo $row['DelvTime'];?>">
<br>
<input type="submit" name="sub" id="saverest" value="Edit">
<button type="button" id="cancelrest">Cancel</button>
</form>  
<?php }}} ?>

<?php if(isset($_POST['sub'])){
	$rname = $_POST['namearea'];
	$hnum = $_POST['hotarea'];
	$fnum = $_POST['feesarea'];
	$tnum = $_POST['timearea'];
	$sql2 = "UPDATE restaurant SET Name = '$rname', Hotline = '$hnum', DelvFees = '$fnum', DelvTime = '$tnum' WHERE ID = '$id'";
    $db_obj->executesql($sql2);
} ?>	
<script type="text/javascript" src="../js/AdminPage.js"></script>
<script type="text/javascript">
	var cncl = document.getElementById("cancelrest");
cncl.addEventListener("click", cnclFunc);
function cnclFunc(){
  window.location.href="addrestaurant.php";
}
</script>
</body>

</html>