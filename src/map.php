<?php 
session_start();
require_once('createTrip.php');

 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Map - Traveller</title>
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
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script>
		 function SaveToFavorite()
         {
			var str1 = document.getElementById("user").value;
			var str2 =document.getElementById("pac-input").value; 
			var str = str1 + "1" +str2;
           if (str.length==0)
           {
            document.getElementById("v1").innerHTML="";
           return;
          }
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
              }
              else
           {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
             }
              xmlhttp.onreadystatechange=function()
               {
           if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
              document.getElementById("v1").innerHTML=xmlhttp.responseText;
   
              }
            }
           xmlhttp.open("GET","favorite.php?q="+str,true);
           xmlhttp.send();
            }
		</script>
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
							<li class="active"><a href="./map.php"><i class="fa fa-fw fa-map-marker"></i>&nbsp;Map</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-map"></i>&nbsp;Itinerary <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="./itinerary.php">View</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="./organise.php">Organise</a></li>
								</ul>
							</li>
						</ul>
						<!-- Show the username, settings and favourites buttons for logged in users. -->
					<input type="hidden" id= "user" value="<?php echo $_SESSION["username"];?>" />
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
			</nav><!-- /navbar -->
		</div><!--/.header-->
		<div class="mapWrapper hideInactive" id="map"></div>
		<!-- Button for mobile navigation -->
		<button type="submit" class="btn btn-main btnBackToForm" id="btnShowForm">Back</button>
		<div class="rightPanel showActive" id="panelForm">
			<div class="routeSearch">
				<!-- Draw route between 2 places -->
                <form name = "mapPage" method="post"  action="?">
				<div class="form-group">
					<div class="input-group date form_datetime col-md-5" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
						<input class="form-control" size="13" type="text" value="" id="start" name="start" placeholder="Start Time" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>
					<input type="hidden" id="dtp_input1" value="" /><br/>
				</div>
				<div class="form-group">
					<div class="input-group date form_datetime col-md-5" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
						<input class="form-control" size="13" type="text" value="" id="end" name="end" placeholder="End Time" readonly>
						<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
						<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
					</div>
					<input type="hidden" id="dtp_input2" value="" /><br/>
                    <?php if (isset($_SESSION["username"])){
                 echo  '<input type="hidden" id="dtp_input1" name="username" value="$_SESSION["username"]" /><br/>' ; 
				 } 
				 ?> 
				
				</div>
			</div>
				<div class="col-lg-12">
					<input type="submit"  id="btnRouteSearch" class="btn btn-main btn-block" value="Let's Go" />
				</div>
			</form>
			
			<div class="col-lg-12">
				<input id="pac-input" class="controls" name="favorite" type="text" placeholder="Search Your favorite Place">
			</div><!-- /.col-lg-12 -->
			<div id = "v1" >12</div>
					
			<div class="col-lg-12">
				<div class="form-group">
					<!-- Button for mobile navigation -->
					<button type="submit" class="btn btn-main btn-block toMap" >Go to Map</button>
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
		
		
		
		
		
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

		<script type="text/javascript">
			$('.form_datetime').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				forceParse: 0,
				showMeridian: 1
			});
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

<script>
	var map;
			
			// This example adds a search box to a map, using the Google Place Autocomplete
			// feature. People can enter geographical searches. The search box will return a
			// pick list containing a mix of places and predicted search terms.

			function initAutocomplete() {
			  map = new google.maps.Map(document.getElementById('map'), {
				 center: new google.maps.LatLng(-37.8136, 144.9631),
				zoom: 13,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			  });

			  // Create the search box and link it to the UI element.
			  var input = document.getElementById('pac-input');
			  var searchBox = new google.maps.places.SearchBox(input);
			   var infoWindow = new google.maps.InfoWindow();

			 var service = new google.maps.places.PlacesService(map);
			 
			 var counter=0;
			 var photoUrl= new Array();
			 var searchImg = document.getElementsByName("search_img");  
			 var searchDiv = document.getElementsByName("search_div");  

			  // Bias the SearchBox results towards current map's viewport.
			  map.addListener('bounds_changed', function() {
				searchBox.setBounds(map.getBounds());
			  });

			  var markers = [];
			  
			  
			  
			  // [START region_getplaces]
			  // Listen for the event fired when the user selects a prediction and retrieve
			  // more details for that place. 
			  
		

			  
			  
			  searchBox.addListener('places_changed', function() {
				  
				var places = searchBox.getPlaces();
				
				
				if (places.length == 0) {
				  return;
				}

				// Clear out the old markers.
				markers.forEach(function(marker) {
				  marker.setMap(null);
				});
				markers = [];

				// For each place, get the icon, name and location.
				var bounds = new google.maps.LatLngBounds();
				places.forEach(function(place) {
				  var icon = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				  };
				  

				  var photos = place.photos;
					if (!photos) {
					return;
					}
					
				  
				  // Create a marker for each place.
				  var itinerary_marker = new google.maps.Marker({
					map: map,					
					title: place.name,
					position: place.geometry.location,
					icon: photos[0].getUrl({'maxWidth': 120, 'maxHeight': 120})
			        });
					
					photoUrl[counter]=photos[0].getUrl({'maxWidth': 120, 'maxHeight': 80});
				var contentString='';
					var infowindow = new google.maps.InfoWindow({
						content: contentString,
						maxWidth: 800
					  });

					
				  markers.push(itinerary_marker);
				  

				   google.maps.event.addListener(itinerary_marker, 'click', function() {
						service.getDetails(place, function(result, status) {
						  if (status !== google.maps.places.PlacesServiceStatus.OK) {
							console.error(status);
							return;
						  }
						  
						   contentString = '<div id="content">'+
						  '<h1 id="firstHeading" class="firstHeading">'+result.name+'</h1>'+
						  '<div class="form-group">'+'<button type="submit" id="likePlace" onclick="SaveToFavorite()">'+"Like"+'</button>'+
						  '</div>'+
						  '<div id="bodyContent">'+
						  '<div>'+'<h4>'+result.formatted_address+'</h4>'+'</div>'+
						  '<div>'+'<img src="'+result.photos[0].getUrl({'maxWidth': 120, 'maxHeight': 120})+'" alt="Photo" />'+'<img src="'+result.photos[1].getUrl({'maxWidth': 120, 'maxHeight': 120})+'" alt="Photo" />'+'<img src="'+result.photos[2].getUrl({'maxWidth': 120, 'maxHeight': 120})+'" alt="Photo" />'+'<img src="'+result.photos[3].getUrl({'maxWidth': 120, 'maxHeight': 120})+'" alt="Photo" />'+'<img src="'+result.photos[4].getUrl({'maxWidth': 120, 'maxHeight': 120})+'" alt="Photo" />'+'</div>'+
						  '<p><b>'+result.name+'</b> rating &#40;from 1 to 5 &#41; is <b>'+result.rating+'</b></p>'+
						  '<p><b>'+result.reviews[0].author_name+' </b>"'+result.reviews[0].text+'"<b>Rating '+result.reviews[0].rating+' Star</b></p>'+
						  '<p><b>'+result.reviews[1].author_name+' </b>"'+result.reviews[1].text+'"<b>Rating '+result.reviews[1].rating+' Star</b></p>'+
						  '<p><b>'+result.reviews[2].author_name+' </b>"'+result.reviews[2].text+'"<b>Rating '+result.reviews[2].rating+' Star</b></p>'+
						  '<p>'+result.international_phone_number+'</p>'+ 
						  '<p><a href='+result.website+' target="blank">'+''+result.website+'</a> '+'</p>'+
						  '</div>'+
						  '</div>';
						  
						  
						  
						  
						  infoWindow.setContent(contentString);
						  infoWindow.open(map, itinerary_marker);
						});
					  });
					  
			
					
				   
				 // google.maps.event.addListener(itinerary_marker, 'click', function() {
				//	infowindow.open(map, this);
				//
				//	});

				  	

				  if (place.geometry.viewport) {
					// Only geocodes have viewport.
					bounds.union(place.geometry.viewport);
				  } else {
					bounds.extend(place.geometry.location);
				  }
				  if (places.length == 0) {
						  return;
						}else{
							counter++;
							}					
				  
				});
				
				map.fitBounds(bounds);
											
						
			  });
			  // [END region_getplaces]
			}
			

		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGqZdfV4eQOC1zuTHO0AKnuN1GRkkbo0o&libraries=places&callback=initAutocomplete" async defer></script>
		
	</body>
</html>