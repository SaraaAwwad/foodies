<?php
echo '
<div class="sidenav" id="mysidenav" >
<img class="bk2" src="../css/images/'.$_SESSION["adminImage"].'" alt="profile picture">
<hr id="sidenavhr"> 

<a href="profile.php?id='.$_SESSION['adminID'].' " class="sidenavitems item"><i class="fa fa-user-circle-o"></i> Profile</a>
<a href="teammembers.php?id='.$_SESSION['adminID'].' " class="sidenavitems item"><i class="fa fa-group"></i> Team Members</a>
<a href="statistics.php?id='.$_SESSION['adminID'].'" class="sidenavitems item"><i class="fa fa-line-chart"></i> Statistics</a>
<button id ="buttontoggle" class="accordion"><i class="fa fa-glass"></i> Restaurants<i id ="ii" class="down"></i></button>
<div id="panels">
<a href="addrestaurant.php?id='.$_SESSION['adminID'].'" class="sidenavitems PanelItem"><i class="	fa fa-user-plus"></i> Manage</a>
<a href="viewrest.php?id='.$_SESSION['adminID'].'" class="sidenavitems PanelItem"><i class="fa fa-reorder"></i> View</a>
</div>
</div>
';


?>