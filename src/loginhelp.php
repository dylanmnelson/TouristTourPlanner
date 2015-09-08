<?php 
require_once('login-php.php');
 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign in - Traveller</title>
        <meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.css">
		<!--Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!--START body html content-->
		<h1 class="heading">Logging in help</h1>
		<div class="center-block formLogin">
			<p> Your username or password was incorrect. Please make sure you are entering your data that relates to the Tour Journey Planner website, some hints are to check the spelling of your username and password and ensure that your not using incorrect capitlization. </p>
<div class="form-group">
				<a href="signup.php" id="linkSignup"><span>Don't have an account yet? Click here to create one!</span></a>
			</div>
			<div class="form-group">
				<a href="map.php" id="linkLoginGuest"><span>Click here to login as a guest.</span></a>
			</div>
<div class="form-group">
				<a href="login.php" id="linkLogin"><span>Click here try log in again.</span></a>
			</div>

		</div>
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
	</body>
</html>