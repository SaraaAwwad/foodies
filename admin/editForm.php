<?php
include_once ("\..\db\db_connect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title> Add </title>
<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>

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


<div class="main2" >
<div class="container" id="showcase">
    <h1 id="con">Update Restaurant</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Restaurants</li>
  <li><a href="../admin/addrestaurant.php">Manage</a></li>
  <li>Update</li>
</ul>

<?php 
$id = $_GET['id'];
$db_obj = new dbconnect;
$sql = "SELECT * FROM restaurant WHERE ID= '$id'";
$qresult = $db_obj->selectsql($sql);
$row = mysqli_fetch_array($qresult);
$name = $row['Name'];
$hot = $row['Hotline'];
$delvfees = $row['DelvFees'];
$delvtime = $row['DelvTime'];
$id = $row['ID'];
$image = $row['Image'];
render($id,$name,$hot,$delvfees,$delvtime,$image);
?>

<?php function render($id,$name,$hot,$delvfees,$delvtime,$image){ ?>
		
<form action="" method="POST">
<b style="color: green;">ID</b><br>
<input type="text" name="idarea" id="restarea" value="<?php echo $id; ?>" disabled="true"><br>	
<b style="color: green;">Name</b><br>
<input type="text" name="namearea" id="restarea" value="<?php echo $name; ?>" ><br>
<b style="color: green;">Hotline</b><br>
<input type="text" name="hotarea" id="restarea" value="<?php echo $hot; ?>"><br>
<b style="color: green;">Delivery Fees</b><br>
<input type="text" name="feesarea" id="restarea" value="<?php echo $delvfees;?>"><br>
<b style="color: green;">Delivery Time</b><br>
<input type="text" name="timearea" id="restarea" value="<?php echo $delvtime;?>"><br>
<b style="color: green;">Image (With its Extension)</b><br>
<input type="text" name="imagearea" id="restarea" value="<?php echo $image;?>"><br>

<input type="submit" name="update" id="saverest" value="Update"/>
<input type="button" id="cancelrest" value="Cancel"/>
</form>

<?php  }  ?>
<?php
if(isset($_POST['update'])){
	$id = $_GET['id'];
	$a = $_POST['namearea'];
	$b = $_POST['hotarea'];
	$c = $_POST['feesarea'];
	$d = $_POST['timearea'];
	$e = $_POST['imagearea'];
	$sql1 = "UPDATE restaurant SET Name = '$a' , Hotline = '$b', DelvFees = '$c', DelvTime = '$d',Image = '$e' WHERE ID = '$id'";
    $db_obj->selectsql($sql1);
    header("Location: addrestaurant.php");
}

?>

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