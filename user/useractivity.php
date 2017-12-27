<?php 
session_start();
require_once("../classes/user.php");
$user = new User($_SESSION['userID']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/topnav.css">
	<link rel="stylesheet" type="text/css" href="../css/userstyle.css">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa|Chewy|Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>User-Profile</title>	
</head>
<?php include("header.php"); ?>
<body>
	
	<main>
	<div class="row-gap"></div>
	<div class="row">
		<div class="col-4">
			<div class="sidenav">
				<ul>
					<li><a href="userprofile.php">My Account</a></li>
					<li><a href="useractivity.php" class="sideactive">View Activity</a></li>
					<li><a href="useractivity.php" class="sub subactive">View Ratings</a></li>
					<li><a href="userhistory.php">View History</a></li>
				</ul>
			</div>
		</div>

		<div class="col-8">
			<div class="centview">
				<?php 
				echo '<h2 style="text-align:center;">You Can Find/Change Ratings You\'ve Made On Restaurants You\'ve Ordered From. </h2><hr>';
				$r = $user->getRatings();
				if($r){
					for($i=0; $i<count($user->Rests); $i++){
						echo '<span> '.$user->Rests[$i]->Name.' </span>';
						
						$r = $user->Ratings[$i]->Rating;

						echo'<div id="table'.$user->Ratings[$i]->ID.'_'.$user->Rests[$i]->ID.'">';
							for($j=0; $j< $r; $j++){
								echo'<div class="star ratings_stars" id="'.$user->Ratings[$i]->ID.'_'.$user->Rests[$i]->ID.'_'.$j.'""></div>';
							}

							for($j; $j<5; $j++){
								echo'<div class="star ratings_vote" id="'.$user->Ratings[$i]->ID.'_'.$user->Rests[$i]->ID.'_'.$j.'" ></div>';
							}	
							echo'</div>';
					}
				}else{
				?>
				<h3 id="test" style="text-align: center;">We care about what you think!<br>
				We'd love if you could interact more with our community and leave us helpful reviews and feedback.</h3>
				<br><br>
				<img src="../css/images/social.gif" style="padding-left: 30%"><?php }?>
			</div>
		</div>
	</div>
	</main>
	
<div class="row-gap"></div>	
<?php include("footer.php") ?>

<script>
	$(document).ready(function(data){
		
		$('.star').click(function(){

			var rating_id = $(this).attr("id");
			//alert(rating_id);
			var temp = rating_id.split("_"); // should contain restid_0->4

			for(var i=0; i<=temp[temp.length-1]; i++){
				if($("#"+temp[0]+"_"+temp[1]+"_"+i).hasClass( "ratings_vote" )){
					$("#"+temp[0]+"_"+temp[1]+"_"+i).removeClass('ratings_vote');
				}
				$("#"+temp[0]+"_"+temp[1]+"_"+i).addClass('ratings_stars');
			}

			for(var i; i<5;i++){
				$("#"+temp[0]+"_"+temp[1]+"_"+i).addClass('ratings_vote');
				$("#"+temp[0]+"_"+temp[1]+"_"+i).removeClass('ratings_stars');	
			}

				$table = temp[0]+"_"+temp[1];

		        $.ajax({  
                    url:"updaterating.php",  
                    method:'POST',  
                    dataType:'json',
                    data:{  
 						rating_id:rating_id 
                    },  
                    success:function(data)  
                     {  
                     	//alert("Review is done!");
                     },
    				error: function (jqXHR, exception) {
				        var msg = '';
				        if (jqXHR.status === 0) {
				            msg = 'Not connect.\n Verify Network.';
				        } else if (jqXHR.status == 404) {
				            msg = 'Requested page not found. [404]';
				        } else if (jqXHR.status == 500) {
				            msg = 'Internal Server Error [500].';
				        } else if (exception === 'parsererror') {
				            msg = 'Requested JSON parse failed.';
				        } else if (exception === 'timeout') {
				            msg = 'Time out error.';
				        } else if (exception === 'abort') {
				            msg = 'Ajax request aborted.';
				        } else {
				            msg = 'Uncaught Error.\n' + jqXHR.responseText;
				        }
				        alert(msg);
   				 },  
            
        	}); 
		
		});


	});
</script>
</body>
</html>