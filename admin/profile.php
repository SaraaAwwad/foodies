<?php 
session_start();
require("/../classes/admin.php");
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

<?php include("adminheader.php"); ?>

<body>
<main>
<?php include("adminsidenav.php"); ?>

<?php 
$id = $_SESSION['adminID'];
$admin = new Admin($id);

$fname = $admin->getFName();
$lname = $admin->getLName();
$email = $admin->getEmail();
$creation = $admin->getCreationDate();
$id = $admin->ID;
$image = $admin->getImage();

render($id,$fname,$lname,$email,$creation,$image);
?>

<?php function render($id,$fname,$lname,$email,$creation,$image){ ?>
<div class="main2">

  <!-- Header -->
  <div class="container" id="showcase">

  <h1 id="Profileh" >Admin Profile</h1>
	<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Profile</li>
</ul>
  <hr class="round1">
	<img class="back4" src="../css/images/<?php echo ''.$image.'';?>" alt="profile picture">
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

  </div>
  </div>
<?php  }  ?>
</main>
<script type="text/javascript" src="../js/AdminPage.js"></script>
</body>
</html>