<?php 
session_start();

 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Account Settings - Traveller</title>
		<meta name="description" content="Search for attractions, save your favourite places, and create an itinerary for your perfect trip.">
		<meta name="keywords" content="traveller, travel, tour, tourist, planner, map, itinerary, trip">
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="stylesheet" href="css/normalize.css">
		<!--Bootstrap & Font Awesome-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/main.css">
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="ValidateEmail.js" type="text/javascript" ></script>
	</head>
	<body>
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!--START body html content-->
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
							<li class="dropdown">
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
							<li class="dropdown active">
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
			</nav><!-- /navbar -->
		</div><!--/.header-->
		<!-- Settings page html starts here -->
		<div class="contentWrapper">
        <div class="center-block formChangeEmail">
        <form action="updateEmail.php" method="post">

			<h1 class="heading">Change Your Email Address</h1>
            <!-- if there has been a recent change to the email address the user should be notified -->
			<?php if($_SESSION[emailChange]=="yes")
			{	$dbuser = "arholt";
$dbpass = "sit203"; 
$db = "SSID";
$connect = oci_connect($dbuser, $dbpass, $db);

if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}
 if (isset($_SESSION["username"]))
 {
 $UserName = $_SESSION["username"];
 }
 $query= "SELECT * FROM TP_Accounts WHERE UserName='$UserName'" ;
	//WHERE UserName='$UserName'"
	$stsm = oci_parse($connect, $query);
	
	oci_execute($stsm);
	while(oci_fetch($stsm))
	{
	$email = oci_result($stsm, "EMAIL");
	}
 
				 echo "<p> You have recently changed your email address, the new email address is:  ".$email." </p>";}
				?>
                <div class="form-group" id="groupEmailChange">
            							<label for="changeEmailAddress"> New Email Address:</label>
							<input type="text" class="form-control" id="signUpEmailAddress" placeholder="Email Address" name="Email"onblur = "ValidateEmail(this.value)"></input>
							<span id = "EmailError" class = "errorMessage"></span>
                            </div>                          
			<div class="form-group" id="groupPassword">
             <label for="password">Enter Password:</label>
			<input type="password" class="form-control" name="Password" id="password" placeholder="Enter your Password to confirm"></input>
     </div>
            <br>
            <button class="btn btn-main btn-block" type="submit">Update email</button>
            </form>
            <form action="updatePassword.php" method="post">
			<h1 class="heading">Change Your Password</h1>
            <?php if($_SESSION[passwordChange]=="yes")
			{
				echo "<P> You have recently changed your password</p>";
			}?>
            <div class="form-group" id="groupPassword">
             <label for="password">Enter current Password:</label>
			<input type="password" class="form-control" name="PasswordC" id="passwordC" placeholder="Enter your Password to confirm"></input>
            </div>
            <div class="form-group" id="groupPassword">
             <label for="password">Enter new Password:</label>
			<input type="password" class="form-control" name="PasswordN" id="passwordN" placeholder="Enter your Password to confirm"></input>
            </div>
            <button class="btn btn-main btn-block" type="submit">Update password</button>
            </form>
			<h1 class="heading">Delete Your Account</h1>
            <form action="deleteAccount.php" method="post">
             <button class="btn btn-main btn-block" type="submit">Delete Account</button>
            </form>
           </div> 
		</div>
		<!-- /End settings page html -->
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>           
	</body>
</html>