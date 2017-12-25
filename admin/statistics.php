<?php
require_once("/../classes/orders.php");
require_once("/../classes/product.php");
require_once("/../classes/user.php");
require_once("/../classes/restaurant.php");
session_start();
$order = new Order;
$qresult = $order->getCount();
$qresult2 = $order->getallCount();
$prod = new Product;
$res = $prod->getallCount();
$user = new User;
$allusers = $user->getallCount();
$restaurant = new Restaurant;
$allrest = $restaurant->getallCount();
?>
<!DOCTYPE html>
<html>
<head>
<title> Statistics</title>

<link rel="stylesheet" type="text/css" href="..//css/topnav.css">
<link rel="stylesheet" type="text/css" href="..//css/AdminPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<?php include("adminheader.php"); ?>
<main>
<?php include("adminsidenav.php"); ?>

<div class="main2">
  <!-- Header -->
  <div class="container" id="showcase">
  <h1 id="Profileh">Statistics</h1>
<ul class="breadcrumb">
	<i class="fa fa-home"></i>
  <li><a href="../admin/AdminPage.php">Admin</a></li>
  <li>Statistics</li>
</ul>

<div id="piechart"></div>
              <div class="cardteam1 cardteam1-1">
              <div class="card-image">
              <img class="plate1" src="../css/images/allusers.png" align="middle">
              <b id="names2">Users</b>
              </div>
              <b id="names1"><?php echo''.$allusers.'';?></b>
              </div>

              <div class="cardteam3 cardteam1-1">
              <div class="card-image">
              <img class="plate2" src="../css/images/restaurants.png" align="middle">
              <b id="names2">Restaurants</b>
              </div>
              <b id="names1"><?php echo ''.$allrest.''; ?></b>
              </div>

              <div class="cardteam2 cardteam1-1">
              <div class="card-image">
              <img class="plate3" src="../css/images/products1.png" align="middle">
              <b id="names2">Products</b>
              </div>
              <b id="names1"><?php echo ''.$res.''; ?></b>
              </div>

</div>
</div>

</main>

<!-- <script type="text/javascript" src="../js/AdminPage.js"></script> -->
<script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Day', 'Number of Orders'],
  ['Today Orders', <?php echo ''.$qresult.''; ?>],
  ['All Orders', <?php echo ''.$qresult2.''; ?>]
]);
  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Orders Per Day', 'width':500, 'height':356};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>