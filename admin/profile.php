<?php 
session_start();
require("/../classes/admin.php");
?>
<?php
$admin = new Admin;
?>
<!DOCTYPE html>
<html>
<head>
<title> Profile </title>
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
<header>
		<nav class="menu">
      <ul>
        <li class="logo"> <a href= "AdminPage.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="log"> Foo<span class="org">d</span>ies </a></li>
        <li><a href="../adminlogin.php">Logout</a></li>
      </ul>
      </nav>
</header>
	<main>
<div class="sidenav" id="mysidenav" >
<img class="bk2" src="../css/images/<?php echo ''.$_SESSION["adminImage"].'' ?> " alt="profile picture">
<hr id="sidenavhr"> 

<a href="profile.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-user-circle-o"></i> Profile</a>
<a href="teammembers.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-glass"></i> Restaurants</button>
<div class="panel" style="margin-bottom:0px" id ="paneltoggle" >
<a href="addrestaurant.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems PanelItem"><i class="  fa fa-user-plus"></i> Manage</a>
<a href="viewrest.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems PanelItem"><i class="fa fa-reorder"></i> View</a>
</div>
<a href="statistics.php?id=<?php echo ''.$_SESSION['adminID'].''; ?>" class="sidenavitems item"><i class="fa fa-line-chart"></i> Statistics</a>
</div>


<?php 
$id = $_GET['id'];
$result = $admin->getSelect($id);
$fname = $result['FName'];
$lname = $result['LName'];
$email = $result['Email'];
$creation = $result['CreationDate'];
$visited = $result['LastVisited'];
$id = $result['ID'];
$image = $result['Image'];
$pass = $result['Password'];
render($id,$fname,$lname,$email,$creation,$visited,$image,$pass);
?>

<?php function render($id,$fname,$lname,$email,$creation,$visited,$image,$pass){ ?>
<div class="main2">

  <!-- Header -->
  <div class="container" id="showcase">

  <h1 id="Profileh" >Profile</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Profile</li>
</ul>
  <hr class="round1">
	<img class="back4" src="../css/images/<?php echo ''.$image.'';?>" alt="profile picture">
  <img id="medias" src="../css/images/social.png" alt="social media">
	<div class="cards">
  <div class="cont1">
    <h4 id="cardsheader">Admin ID</h4> 
    <p><?php echo ''.$id.''; ?> </p> 
  </div>
</div>
  <div class="cards">
  <div class="cont1">
    <h4 id="cardsheader">First Name</h4> 
    <p><?php echo ''.$fname.''; ?> </p> 
  </div>
</div>
<div class="cards">
  <div class="cont2">
    <h4 id="cardsheader">Last Name</h4> 
    <p><?php echo ''.$lname.''; ?></p> 
  </div>
</div>
<div class="cards">
  <div class="cont3">
    <h4 id="cardsheader">Email</h4> 
    <p><?php echo ''.$email.''; ?></p> 
  </div>
</div>
<div class="cards">
  <div class="cont4">
    <h4 id="cardsheader">Creation Date</h4> 
    <p><?php echo ''.$creation.''; ?></p> 
  </div>
</div>
<div class="cards">
  <div class="cont4">
    <h4 id="cardsheader">Last Visited</h4> 
    <p><?php echo ''.$visited.''; ?></p> 
  </div>
</div>

  </div>
  </div>
<?php  }  ?>

</main>
<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>
</html>