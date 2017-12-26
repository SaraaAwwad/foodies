<?php
echo '
<div class="sidenav" id="mysidenav" >
<img class="bk2" src="../css/images/'.$_SESSION["adminImage"].'" alt="profile picture">
<hr id="sidenavhr"> 

<a href="profile.php?id='.$_SESSION['adminID'].' " class="sidenavitems item"><i class="fa fa-address-card-o"></i> Profile</a>
<a href="teammembers.php?id='.$_SESSION['adminID'].' " class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<a href="statistics.php?id='.$_SESSION['adminID'].'" class="sidenavitems item"><i class="fa fa-pie-chart"></i> Statistics</a>
<a href="vieworders.php?id='.$_SESSION['adminID'].'" class="sidenavitems item"><i class="fa fa-sort-numeric-asc"></i>View Orders</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-cutlery"></i> Restaurants<i id ="ii" class="down"></i></button>
<div id="panels">
<a href="addrestaurant.php?id='.$_SESSION['adminID'].'" class="sidenavitems PanelItem"><i class="fa fa-cogs"></i> Manage</a>
<a href="viewrest.php?id='.$_SESSION['adminID'].'" class="sidenavitems PanelItem"><i class="fa fa-th-list r"></i> View </a>
</div>
</div>
';


?>