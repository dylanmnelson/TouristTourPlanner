<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Map - Traveller</title>
        <meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.css">
		<!--Bootstrap & Font Awesome-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom CSS -->
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!--START body html content-->
		<div class="header">
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
					</div><!--/.navbar-header-->
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="./map.php"><i class="fa fa-fw fa-map-marker"></i>&nbsp;Map</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-map"></i>&nbsp;Itinerary <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="./itinerary.php">View</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li role="separator" class="divider"></li>
									<li class="dropdown-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-user"></i>&nbsp;Hi, Dylan <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">View Profile</a></li>
									<li><a href="#">Saved Routes</a></li>
									<li role="separator" class="divider"></li>
									<li class="dropdown-header">Account</li>
									<li><a href="#">Settings</a></li>
								</ul>
							</li>
							<li><a href="#"><i class="fa fa-fw fa-sign-out"></i>&nbsp;Log Out</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</div><!--/.header-->
		<div class="mapWrapper hideInactive" id="map">
			<div class="content">
				<div id="map-canvas"></div>
				<!-- Button for mobile navigation -->
				<button type="submit" class="btn btn-main btnBackToForm" >Back</button>
			</div>
		</div>
		<div class="rightPanel showActive" id="panelForm">
			<div class="routeSearch">
				<!-- Draw route between 2 places -->
				<div class="form-group">
					<input type="text" class="form-control" name="Start" id="start" placeholder="Where are you travelling from?"></input>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="End" id="end" placeholder="Where are you travelling to?"></input>
				</div>
				<div class="form-group">
					<button type="submit"  class="btn btn-main btn-block toMap" id="btnRouteSearch">Search</button>
				</div>
			</div>
			<div class="filterSearch">
				<!-- Filter by proximity search -->
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" aria-label="...">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter:<span class="caret"></span></button>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="#">Restaurants</a></li>
								<li><a href="#">Hotels</a></li>
								<li><a href="#">Something else here</a></li>
							</ul>
						</div><!-- /btn-group -->
					</div><!-- /input-group -->
				</div><!-- /form-group -->
				<div class="form-group">
					<button type="submit"  class="btn btn-main btn-block toMap" id="btnFilterSearch">Filter</button>  
				</div>
			</div>
		</div>
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
		<script type="text/javascript" src="js/custom.js"></script>
	</body>
</html>