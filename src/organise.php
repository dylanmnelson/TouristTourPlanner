<?php 
session_start();
 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Organise - Traveller</title>
        <meta name="description" content="">
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
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		
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
		<div class="mapWrapper hideInactive" id="map">
			<div class="content">
				<div id="map-canvas"></div>
				<!-- Button for mobile navigation -->
				<button type="submit" class="btn btn-main btnBackToForm" >Back</button>
			</div>
		</div>
		<div class="rightPanel showActive" id="panelForm">
			<div class="container">
			<div class="content">
			
				<table class="table">
					<thead>
					  <tr>
						<th>Yes/No</th>
						<th>Place</th>
						<th>Time</th>
					  </tr>
					</thead>
					<tbody>
					<tr>
					<td></td>
					<td><h4>Morning</h4></td>
					<td></td>
					</tr>
					<tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>Melbroune Botanic Garden
						</td>
						<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range4.value=value">
								<output id="range4">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>
					  <tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>Melbroune Star
						</td>
						<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range1.value=value">
								<output id="range1">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>
					  <tr>
					<td></td>
					<td><h4>Noon</h4></td>
					<td></td>
					</tr>
					  <tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>Southern Cross
						</td>
						<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range2.value=value">
								<output id="range2">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>
					   <tr>
					<td></td>
					<td><h4>Afternoon</h4></td>
					<td></td>
					</tr>
					  <tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>Melbroune Zoo
						</td>
						<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range3.value=value">
								<output id="range3">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>
					   <tr>
					<td></td>
					<td><h4>Evening</h4></td>
					<td></td>
					</tr>
					  <tr>
						<td>
						<input type="checkbox" checked="checked"/>
						</td>
						<td>Best Western Atlantis Hotel
						</td>
						<td>
						<div class="form-group">
							<div class="input-group date form_time col-md-5" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
								<input class="form-control" size="16" type="text" value="" readonly>
								<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							</div>
							<input type="hidden" id="dtp_input3" value="" />
						</div>
						<div>Hour</div>
						<div class="row">
							<div class="col-xs-6">
							  <div class="range range-primary">
								<input type="range" name="range" min="0" max="12" value="1" onchange="range5.value=value">
								<output id="range5">1</output>
							  </div>
							</div>
						  </div>
						</td>
					  </tr>
					 
					</tbody>
				  </table>
			</div>
		</div>
		</div>
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		 
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
		
		<script type="text/javascript">
			$('.form_date').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
			});
			$('.form_time').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 1,
				minView: 0,
				maxView: 1,
				forceParse: 0
			});
		</script>
	
		

	</body>
</html>