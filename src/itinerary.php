<?php 
session_start();
 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Itinerary - Traveller</title>
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
		<link rel="stylesheet" href="css/main.min.css">
		<meta name="keywords" content="drag and drop, interaction, inspiration, web design, ui" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/bottom-area.css" />
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script>
		function SaveTosession()
         {
			var search = "attraction";///what we are search , attractions , hotel or restaurant.
			var address=document.getElementById('pac-input').value;
			var trip = document.getElementById('trip').value;
			var str = search +"|"+address+"|"+trip;
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
           xmlhttp.open("GET","addItinerary.php?q="+str,true);
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
						<input type="hidden" id= "trip" value="<?php echo $_SESSION["tripID"];?>" />
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
		<div class="newRightPanel showActive" id="panelForm">
				<header class="codrops-header">
					<h1>Melbourne<span>Create your unique itinerary</span></h1>
					<div class="col-lg-12">
						<input id="pac-input" class="controls" type="text" placeholder="Search Place">
					</div><!-- /.col-lg-12 -->
					<nav class="codrops-demos">
						<a class="current-demo" href="itinerary.php">Favorite</a>
						<a href="javascript:attraction()">Attraction</a>						
						<a href="javascript:restaurant()">Restaurant</a>
						<a href="javascript:hotel()">Hotel</a>						
					</nav>
				</header>
				<!-- Button for mobile navigation -->
				<button type="submit" class="btn btn-main toMap">Go to Map</button>
				<!-- Grid of place results. -->
				<div id="grid" class="grid clearfix">
					<div class="grid__item" id="div1"><i class="fa fa-fw fa-image"><img src="img/Melbourne-Skyline.jpg"></img></i></div>
					<div class="grid__item" id="div2"><i class="fa fa-fw fa-image"><img src="img/melbourne.jpg"></img></i></div>
					<div class="grid__item" id="div3"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item" id="div4"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item" id="div5"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item" id="div6"><i class="fa fa-fw fa-image"></i></div>
					<div class="grid__item" id="search_div1" name="search_div" style="display:none;"><i class="fa fa-fw fa-image"><img src="" id="search_img1" name="search_img"></img></i></div>
				</div>
				<section class="codrops-top clearfix">
					<div><span class="center"><a href="" class="animate" ><span><h6>Next Day</h6></span></a></span></div>
					</br>
					<div><span class="center"><a href="organise.php" class="animate" ><span><h5>Finish</h5></span></a></span></div>
				</section>
				
				<div id="drop-area" class="drop-area">
					<div class="drop-area__content"><h6>Drag and Drop the item into the Box</h6>
					
						<div class="drop-area__item"><div class="dummy"><h5>Morning<h5></div></div>
						<div class="drop-area__item"><div class="dummy"><h5>Noon<h5></div></div>
						<div class="drop-area__item"><div class="dummy"><h5>Afternoon<h5></div></div>
						<div class="drop-area__item"><div class="dummy"><h5>Evening<h5></div></div>
					</div>
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
								// take dropped item and put it into database 
								
								SaveTosession();
								
							};

							if( !wasDropped ) {
								afterDropFn();
								//SaveTosession();
							}
							else {
								// after some time hide drop area and remove class 'drag-active' from body
								clearTimeout( dropAreaTimeout );
								dropAreaTimeout = setTimeout( afterDropFn, 400 );
								//SaveTosession();
							}
						}
					} );
				} );
			})();
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
		
		<script>
			// This example adds a search box to a map, using the Google Place Autocomplete
			// feature. People can enter geographical searches. The search box will return a
			// pick list containing a mix of places and predicted search terms.
			var map;
			var photoUrl;
			var searchImg = document.getElementsByName("search_img");  
			var searchDiv = document.getElementsByName("search_div");
			
			/**
			 * Function to show the map panel and hide the form panel on mobile.
			 */
			$('.toMap').click(function() {
				$('#panelForm').removeClass('showActive');
				$('#panelForm').addClass('hideInactive');
				$('#map').removeClass('hideInactive');
				$('#map').addClass('showActive');
				
				//Resetting maps
				var center = map.getCenter();
				google.maps.event.trigger(map, 'resize');
				map.setCenter(center);
			});
			
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
						  '<h1 id="firstHeading" class="firstHeading">'+result.name+'</h1>'+
						  '<div class="form-group">'+'<button type="submit" id="likePlace" onclick="SaveToFavorite(favorite);">'+"Like"+'</button>'+
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
				});
				
				map.fitBounds(bounds);
				});
			  // [END region_getplaces]
			}
			
			function addToList() {
				document.getElementById("div1").style.display="none";
				document.getElementById("div2").style.display="none";
				document.getElementById("div3").style.display="none";
				document.getElementById("div4").style.display="none";
				document.getElementById("div5").style.display="none";
				document.getElementById("div6").style.display="none";	
				
				searchImg[0].src=photoUrl;
				searchDiv[0].style.display = "block";		
				alert("O(∩_∩)O");
			}
			
			function attraction(){
				document.getElementById("pac-input").value="melbourne attraction";
				}
			function restaurant(){
				document.getElementById("pac-input").value="melbourne restaurant\r";
				}
			function hotel(){
				document.getElementById("pac-input").value="melbourne hotel\r";
				}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGqZdfV4eQOC1zuTHO0AKnuN1GRkkbo0o&libraries=places&callback=initAutocomplete" async defer></script>
		<!-- Custom js -->
		<script type="text/javascript" src="js/custom.min.js"></script>

		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
	</body>
</html>