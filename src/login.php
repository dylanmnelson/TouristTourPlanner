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
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" />
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
		<h1 class="heading">Sign in to Traveller</h1>
		<div class="center-block formLogin">
			<div class="form-group" id="groupUsername">
            <form  method="post" action="?">
				<!--<label for="username">Username:</label>-->
				<input type="text" class="form-control" name="UserName" id="username" placeholder="Enter your Username"></input>
			</div>
			<div class="form-group" id="groupPassword">
				<input type="password" class="form-control" name="Password" id="password" placeholder="Enter your Password"></input>
			</div>
			<div class="form-group" id="buttonLogin">
				<button type="submit"  class="btn btn-main btn-block" >Login</button>  
			</div>
            </form>
			<div class="form-group">
				<a href="signup.php" id="linkSignup"><span>Don't have an account yet? Click here to create one!</span></a>
			</div>
			<div class="form-group">
				<a href="map.php" id="linkLoginGuest"><span>Click here to login as a guest.</span></a>
			</div>
		</div>
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
	</body>
</html>