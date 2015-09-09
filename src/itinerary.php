<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Map - Traveler</title>
        <meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.css">
		<!--Bootstrap & Font Awesome-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom CSS -->
        <link rel="stylesheet" href="css/main.css">
		<meta name="description" content="Inspiration for drag and drop interactions for the modern UI" />
		<meta name="keywords" content="drag and drop, interaction, inspiration, web design, ui" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/bottom-area.css" />
		<script src="js/modernizr.custom.js"></script>
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
						<a class="navbar-brand" href="#">Traveler</a>
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
		<div class="mapWrapper">
			<div class="content">
				<div id="map-canvas"></div>
			</div>
		</div>
		<div class="rightPanel">
			<div class="container">
			
			
			<div class="content">
				<header class="codrops-header">
					<h1>Melbourne<span>Create your unique itinerary</span></h1>
					<nav class="codrops-demos">
						<a class="current-demo" href="">Attraction</a>
						<a href="">Activities</a>
						<a href="">Restaurant</a>
						<a href="">Hotel</a>
						<a href="">Favorite</a>
					</nav>
				</header>
				<div id="grid" class="grid clearfix">
					<div class="grid__item"><i class="fa fa-fw fa-image"><img src="img/Melbourne-Skyline.jpg"></img></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"><img src="img/melbourne.jpg"></img></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item"><i class="fa fa-fw fa-image"></i></div>
				</div>
				<section class="codrops-top clearfix">
					</br>
					<div><span class="center"><a href="" class="animate" ><span>Finish</span></a></span></div>
				</section>
			</div><!-- /content -->
		</div><!-- /container -->
		<div id="drop-area" class="drop-area">
			<div>
				<div class="drop-area__item"><div class="dummy"><h4>Morning<h4></div></div>
				<div class="drop-area__item"><div class="dummy"><h4>Noon<h4></div></div>
				<div class="drop-area__item"><div class="dummy"><h4>Afternoon<h4></div></div>
				<div class="drop-area__item"><div class="dummy"><h4>Evening<h4></div></div>
			</div>
		</div>
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		<script src="js/draggabilly.pkgd.min.js"></script>
		<script src="js/dragdrop.js"></script>
		<script>
			(function() {
				var body = document.body,
					dropArea = document.getElementById( 'drop-area' ),
					droppableArr = [], dropAreaTimeout;

				// initialize droppables
				[].slice.call( document.querySelectorAll( '#drop-area .drop-area__item' )).forEach( function( el ) {
					droppableArr.push( new Droppable( el, {
						onDrop : function( instance, draggableEl ) {
							// show checkmark inside the droppabe element
							classie.add( instance.el, 'drop-feedback' );
							clearTimeout( instance.checkmarkTimeout );
							instance.checkmarkTimeout = setTimeout( function() { 
								classie.remove( instance.el, 'drop-feedback' );
							}, 800 );
							// ...
						}
					} ) );
				} );

				// initialize draggable(s)
				[].slice.call(document.querySelectorAll( '#grid .grid__item' )).forEach( function( el ) {
					new Draggable( el, droppableArr, {
						draggabilly : { containment: document.body },
						onStart : function() {
							// add class 'drag-active' to body
							classie.add( body, 'drag-active' );
							// clear timeout: dropAreaTimeout (toggle drop area)
							clearTimeout( dropAreaTimeout );
							// show dropArea
							classie.add( dropArea, 'show' );
						},
						onEnd : function( wasDropped ) {
							var afterDropFn = function() {
								// hide dropArea
								classie.remove( dropArea, 'show' );
								// remove class 'drag-active' from body
								classie.remove( body, 'drag-active' );
							};

							if( !wasDropped ) {
								afterDropFn();
							}
							else {
								// after some time hide drop area and remove class 'drag-active' from body
								clearTimeout( dropAreaTimeout );
								dropAreaTimeout = setTimeout( afterDropFn, 400 );
							}
						}
					} );
				} );
			})();
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
		<script type="text/javascript" src="js/custom.js"></script>
	</body>
</html>