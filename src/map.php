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
		 function SaveToFavorite(str)
         {
			document.getElementById("pac-input").innerphp = "wrong";
           if (str.length==0)
           {
            document.getElementById("pac-input").innerphp="";
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
              document.getElementById("pac-input").innerphp=xmlhttp.responseText;

              }
            }
           xmlhttp.open("GET","favorite.php?value="+str,true);
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
		<div class="mapWrapper hideInactive" id="map">
				<!-- Button for mobile navigation -->
				<button type="submit" class="btn btn-main btnBackToForm" >Back</button>
				</div>
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
<<<<<<< HEAD
			</div>
				<div class="col-lg-12">	
				<input type="submit"  id="btnRouteSearch" class="controls" value="Let's Go" />
=======
>>>>>>> 6eb134d119a35c6b2a6222466ed2b20aeec5053a
			</div>
				<div class="col-lg-12">
					<input type="submit"  id="btnRouteSearch" class="btn btn-main btn-block" value="Let's Go" />
				</div>
			</form>
			<div class="col-lg-12">
				<input id="pac-input" class="controls" name="favorite" type="text" placeholder="Search Your favorite Place">
			</div><!-- /.col-lg-12 -->
			<!--class="btn btn-main btn-block toMap"-->
		</div>
		<!--END body html content-->
		<!--jQuery with offline backup if needed-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
		<!-- Custom js -->
		<script type="text/javascript" src="js/custom.js"></script>
<<<<<<< HEAD
		
		
		
		
		
=======
>>>>>>> 6eb134d119a35c6b2a6222466ed2b20aeec5053a
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
			// This example adds a search box to a map, using the Google Place Autocomplete
			// feature. People can enter geographical searches. The search box will return a
			// pick list containing a mix of places and predicted search terms.

			function initAutocomplete() {
			  var map = new google.maps.Map(document.getElementById('map'), {
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
<<<<<<< HEAD
						  
						   contentString = '<div id="content">'+
=======
						  photoUrl=result.photos[0].getUrl({'maxWidth': 120, 'maxHeight': 80});
						  var placeDetailPhotoUrl=new Array();
						  var placeDetailReviewAuthorName=new Array();
						  var placeDetailReviewText=new Array();
						  var placeDetailReviewRating=new Array();
						  var i=0;
						   placeDetailPhotoUrl[0]="img/logo-grey-transparent120px.png";
						   placeDetailPhotoUrl[1]="img/logo-grey-transparent120px.png";
						   placeDetailPhotoUrl[2]="img/logo-grey-transparent120px.png";
						   placeDetailPhotoUrl[3]="img/logo-grey-transparent120px.png";
						   placeDetailPhotoUrl[4]="img/logo-grey-transparent120px.png";
						    while(i<5){
						   try
							  {
							  placeDetailPhotoUrl[i]=result.photos[i].getUrl({'maxWidth': 120, 'maxHeight': 120});
							  placeDetailReviewAuthorName[i]=result.reviews[i].author_name;
							  placeDetailReviewText[i]=result.reviews[i].text;
							  placeDetailReviewRating[i]=result.reviews[i].rating;
							  i++;
							  }
							catch(err)
							  {
							  break;
							  }
						  }
						  var favorite = document.getElementById("pac-input").value;
						  
						  
						    contentString = '<div id="content">'+
>>>>>>> 6eb134d119a35c6b2a6222466ed2b20aeec5053a
						  '<h1 id="firstHeading" class="firstHeading">'+result.name+'</h1>'+
						  '<div class="form-group">'+'<button type="submit" id="likePlace" onclick="saveFavorite()">'+"Like"+'</button>'+
						  '</div>'+
						  '<div class="form-group">'+'<button type="submit" id="addToList" onclick="addToList()">'+"Add To List"+'</button>'+
						  '</div>'+
						  '<div id="bodyContent">'+
						  '<div>'+'<h4>'+result.formatted_address+'</h4>'+'</div>'+
						  '<div>'+'<img src="'+placeDetailPhotoUrl[0]+'" alt="" />'+
						  '<img src="'+placeDetailPhotoUrl[1]+'" alt="" />'+
						  '<img src="'+placeDetailPhotoUrl[2]+'" alt="" />'+
						  '<img src="'+placeDetailPhotoUrl[3]+'" alt="" />'+
						  '<img src="'+placeDetailPhotoUrl[4]+'" alt="" />'+
						  '</div>'+
						  '<p><b>'+result.name+'</b> rating &#40;from 1 to 5 &#41; is <b>'+result.rating+'</b></p>'+
						  '<p><b>'+placeDetailReviewAuthorName[0]+' </b>"'+placeDetailReviewText[0]+'"<b>Rating '+placeDetailReviewRating[0]+' Star</b></p>'+
						  '<p><b>'+placeDetailReviewAuthorName[1]+' </b>"'+placeDetailReviewText[1]+'"<b>Rating '+placeDetailReviewRating[1]+' Star</b></p>'+
						  '<p><b>'+placeDetailReviewAuthorName[2]+' </b>"'+placeDetailReviewText[2]+'"<b>Rating '+placeDetailReviewRating[2]+' Star</b></p>'+
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
<<<<<<< HEAD
				
=======

>>>>>>> 6eb134d119a35c6b2a6222466ed2b20aeec5053a
				map.fitBounds(bounds);
			  });
			  // [END region_getplaces]
			}
<<<<<<< HEAD
			function saveFavorite(){
				var favorite = document.getElementById("pac-input").value;
				SaveToFavorite(favorite);
			}
      

=======
>>>>>>> 6eb134d119a35c6b2a6222466ed2b20aeec5053a
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGqZdfV4eQOC1zuTHO0AKnuN1GRkkbo0o&libraries=places&callback=initAutocomplete" async defer></script>
	</body>
</html>
