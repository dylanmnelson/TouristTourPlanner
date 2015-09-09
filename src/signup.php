<?php 
require_once('createAccountPhp.php');
 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign up - Traveller</title>
        <meta name="description" content="">
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="stylesheet" href="css/normalize.css">
		<!--Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="ValidateFirstName.js" type="text/javascript" ></script>
		<script src="ValidateLastName.js" type="text/javascript" ></script>
		<script src="ValidateEmail.js" type="text/javascript" ></script>
		<script src="ValidateUserName.js" type="text/javascript" ></script>
		<script src="ValidatePassword.js" type="text/javascript" ></script>
	</head>
	<body>
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!--START body html content-->
		<h1 class="heading">Create a Traveller Account</h1>
		<div class="center-block formSignUp" class="">
            <form name="register" method="Post"action="?">
				<!--First row-->
				<div class="formSignUpRow col-sm-12">
					<div class="col-sm-6 formSignUpLeft">
						<div class="form-group" id="groupFirstName">
							<label for="signUpFirstName">First Name:</label>
							<input type="text" class="form-control" id="signUpFirstName" placeholder="First Name" name="FirstName"  onblur = "ValidateFirstName(this.value)"></input>
							<span id = "FirstnameError" class = "errorMessage"></span>
						</div>
					</div>
					<!--End left column -->
					<!--Right column -->
					<div class="col-sm-6 formSignUpRight">
						<div class="form-group" id="groupLastName">
							<label for="signUpLastName">Last Name:</label>
							<input type="text" class="form-control" id="signUpLastName" placeholder="Last Name" name="LastName"  onblur = "ValidateLastName(this.value)"></input>
							<span id = "LastnameError" class = "errorMessage"></span>
						</div>
					</div>
					<!--End right column -->
				</div>
				<!--End first row-->
				<!--Second row-->
				<div class="formSignUpRow col-sm-12">
					<div class="col-sm-6 formSignUpLeft">
						<div class="form-group" id="groupUsername">
							<label for="signUpUsername">Username:</label>
							<input type="text" class="form-control" id="signUpUsername" placeholder="Username"  name="UserName"onblur="ValidateUserName(this.value)"></input>
							<span id = "UserNameError" class = "errorMessage"></span>
						</div>
					</div>
					<!--End left column -->
					<!--Right column -->
					<div class="col-sm-6 formSignUpRight">
						<div class="form-group" id="groupEmailAddress">
							<label for="signUpEmailAddress">Email Address:</label>
							<input type="text" class="form-control" id="signUpEmailAddress" placeholder="Email Address" name="Email"onblur = "ValidateEmail(this.value)"></input>
							<span id = "EmailError" class = "errorMessage"></span>
						</div>
					</div>
					<!--End right column -->
				</div>
				<!--End second row-->
				<!--Third row-->
				<div class="formSignUpRow col-sm-12">
					<div class="col-sm-6 formSignUpLeft">
						<div class="form-group" id="groupPassword">
							<label for="signUpPassword">Password:</label>
							<input type="text" class="form-control" id="signUpPassword" placeholder="Password" name="Password" onblur="ValidatePassword(this.value)"></input>
							<span id = "PasswordError" class = "errorMessage"></span>
						</div>
					</div>
					<!--End left column -->
					<!--Right column -->
					<div class="col-sm-6 formSignUpRight">
						<div class="form-group" id="groupUsername">
							<label for="signUpUsername">Retype Password:</label>
							<input type="text" class="form-control" id="signUpPassword" placeholder="Retype Password"></input>
						</div>
					</div>
					<!--End right column -->
					<div class="form-group" id="groupCreateAccountButton">
						<button class="btn btn-success btn-block" type="submit">Create Account</button>
					</div>
					<div class="form-group">
						<a href="login.php" id="linkSignup"><span>Already have an account? Click here to login!</span></a>
					</div>
				</div>
				<!--End third row-->
            </form>
		</div>
		
		
		
		
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
	</body>
</html>