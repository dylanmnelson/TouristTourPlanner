<?php 
session_start();
require_once('saveToAttraction.php');

 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Organise - Traveller</title>
		<meta name="description" content="Search for attractions, save your favourite places, and create an itinerary for your perfect trip.">
		<meta name="keywords" content="traveller, travel, tour, tourist, planner, map, itinerary, trip">
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="stylesheet" href="css/normalize.css">
		<!--Bootstrap & Font Awesome-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!--time picker-->
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<!--jquerymobile for slider-->
	
		<!-- Custom CSS -->
        <link rel="stylesheet" href="css/main.min.css">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		
	</head>
	<body>
			<div class="header">
			<!-- Navbar, pinned to top -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Traveller</a>
						<div class="mobileIcons">
							<a href="./map.php" class="navbar-icon"><i class="fa fa-2x fa-fw fa-map-marker"></i></a>
							<a href="./itinerary.php" class="navbar-icon"><i class="fa fa-2x fa-fw fa-map"></i></a>
							<?php if (isset($_SESSION["firstname"])){
								echo '<a href="./settings.php" class="navbar-icon"><i class="fa fa-2x fa-fw fa-cog"></i></a>';
							} ?>
						</div>
					</div><!--/.navbar-header-->
				<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="./map.php"><i class="fa fa-fw fa-map-marker"></i>&nbsp;Map</a></li>
							<li class="dropdown active">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-map"></i>&nbsp;Itinerary <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="./itinerary.php">View</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="./organise.php">Organise</a></li>
								</ul>
							</li>
						</ul>
						
							<?php if (isset($_SESSION["firstname"])){
                            echo '<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-user"></i>&nbsp;';
                                
echo "Hi: ".$_SESSION["firstname"];
		echo	'<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="favourites.php">View Favourites</a></li>
									<li><a href="#">Saved Routes</a></li>
									<li role="separator" class="divider"></li>
									<li class="dropdown-header">Account</li>
									<li><a href="settings.php">Settings</a></li>
																	</ul>
							
							</li>
							<li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i>&nbsp;Log Out</a></li>
							</ul>';
			} else {
				echo '<ul class="nav navbar-nav navbar-right">';
				echo '<li><a href="login.php"><i class="fa fa-fw fa-sign-in"></i>&nbsp;Log In</a></li>';
				echo '</ul>';
			} ?>
						
					</div><!--/.nav-collapse -->
				</div>
			</nav> <!-- /navbar -->
		</div><!--/.header-->
		
		<?php
		$dbuser = "jyapi";
             $dbpass = "15982749273"; 
             $db = "SSID";
             $connect = OCILogon($dbuser, $dbpass, $db);
           if (!$connect) 
            {
	     echo "An error occurred connecting to the database";
	     exit;
               }
		 $tripID = $_SESSION["tripID"];
		 $UserName = $_SESSION["username"];
		 
		 $query = "SELECT * FROM TP_trips WHERE tripID = '$tripID'";
		$stmt = oci_parse($connect,$query);
		
		if(!$stmt)  {
        echo "An error occurred in parsing the sql string.\n"; 
           exit; 
           }
         oci_execute($stmt);
		 
		 while(oci_fetch_array($stmt))  {
               $stratTime = oci_result($stmt,"STRATTIME");
               $endTime = oci_result($stmt,"ENDTIME");
		 }
		 echo "Hi ";
		 echo '<strong>';
		 echo $UserName;
		 echo '</strong>';
		 echo '</br>';
		 echo "Your Melbourne trip strats from ";
		 echo $stratTime;
		 echo " and end at ";
		 echo $endTime;
		 echo '</br>';
		 echo "Attractions of this trip :";
		 echo '</br>';
		 
		 ////////////////////////////////////////
		  $query1 = "SELECT * FROM TP_cusAttraction WHERE tripID = '$tripID'";
		$stmt1 = oci_parse($connect,$query1);
		
		if(!$stmt1)  {
        echo "An error occurred in parsing the sql string.\n"; 
           exit; 
           }
         oci_execute($stmt1);
		 
		 while(oci_fetch_array($stmt1))  {
               $attractionAddress = oci_result($stmt1,"ATTRACTIONADDRESS");
               $StartTime = oci_result($stmt1,"STARTTIME");
			   $duration = oci_result($stmt1,"DURATION");
			   echo $attractionAddress;
			   echo "&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;";
			   echo "This trip from ";
			   echo $StartTime;
			   echo " , and you will spend ";
			   echo $duration;
			   echo " hours.";
			   echo '</br>';
		 }
		 //////////////////////////////////////////////////
		 $query2 = "SELECT * FROM TP_cusresturant WHERE tripID = '$tripID'";
		$stmt2 = oci_parse($connect,$query2);
		
		if(!$stmt2)  {
        echo "An error occurred in parsing the sql string.\n"; 
           exit; 
           }
         oci_execute($stmt2);
		 
		 while(oci_fetch_array($stmt2))  {
                $restaurantAddress = oci_result($stmt2,"RESTAURANTADDRESS");
               $StartTime = oci_result($stmt2,"STARTTIME");
			   $duration = oci_result($stmt2,"DURATION");
			   echo "Your will go to restaurant  ";
			   echo $restaurantAddress;
			   echo " at ";
			   echo $StartTime;
			   echo " , and you will spend ";
			   echo $duration;
			   echo " hours.";
			   echo '</br>'; 
		 }
		 ///////////////////////////////////////
		 $query3 = "SELECT * FROM TP_cusHotel WHERE tripID = '$tripID'";
		$stmt3 = oci_parse($connect,$query3);
		
		if(!$stmt3)  {
        echo "An error occurred in parsing the sql string.\n"; 
           exit; 
           }
         oci_execute($stmt3);
		 
		 while(oci_fetch_array($stmt3))  {
               $hotelAddress = oci_result($stmt3,"HOTELADDRESS");
               $StartTime = oci_result($stmt3,"STARTTIME");
			   $duration = oci_result($stmt3,"DURATION");
			  
                echo "Your will go to hotel ";
                echo $hotelAddress;
			    echo " at ";
			   echo $StartTime;
			   echo " , and you will spend ";
			   echo $duration;
			   echo " hours.";
			   echo '</br>';
		 }
		 
		
		?>
		
		
		
		
		
		</body>
		</html>