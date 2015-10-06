var map;
var infowindow;

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

var start;
var end;
var mode;
var transit_flag=false;

/*
 * Function to initialise the map, and set the start and end point
 * fields
 */
function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(-37.8136, 144.9631),
		zoom: 12
	};
	map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
		
	// new direction service.
	directionsDisplay = new google.maps.DirectionsRenderer();
	directionsDisplay.setMap(map);
	
	// Changes the symbols on the map to focus on transit.
	var transitLayer = new google.maps.TransitLayer();
	transitLayer.setMap(map);
		
	var input_start = /** @type {HTMLInputElement} */(
		document.getElementById('start'));
	  
	var input_end = /** @type {HTMLInputElement} */(
		document.getElementById('end'));
		
	var autocomplete_start = new google.maps.places.Autocomplete(input_start);
	var autocomplete_end = new google.maps.places.Autocomplete(input_end);
  
	autocomplete_start.bindTo('bounds', map);
	autocomplete_end.bindTo('bounds', map); 
	
	// Search box and map markers.
	// Create the search box and link it to the UI element.
	var input = document.getElementById('search-input');
	var searchBox = new google.maps.places.SearchBox(input);


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
		//document.getElementById("search_img").src=photos[0].getUrl({'maxWidth': 120, 'maxHeight': 80});
	  
	  // Create a marker for each place.
	  var itinerary_marker = new google.maps.Marker({
		map: map,					
		title: place.name,
		position: place.geometry.location,
		icon: photos[0].getUrl({'maxWidth': 120, 'maxHeight': 120})
		});
		
	  markers.push(itinerary_marker);
	  
	  
	  
	   var contentString = '<div id="content">'+
		  '<h1 id="firstHeading" class="firstHeading">'+place.name+'</h1>'+
		  '<div id="bodyContent">'+
		  '<div>'+'<h4>'+place.formatted_address+'</h4>'+'</div>'+
		  '<div>'+'<img src="'+photos[1].getUrl({'maxWidth': 120, 'maxHeight': 120})+'" alt="Photo" />'+'<img src="'+photos[2].getUrl({'maxWidth': 120, 'maxHeight': 120})+'" alt="Photo" />'+'</div>'+
		  '<p><b>'+place.name+'</b> rating &#40;from 1 to 5 &#41; is <b>'+place.rating+'</b></p>'+
		  '<p><b>'+place.reviews[0].author_name+' </b>"'+place.reviews[0].text+'"<b>Rating '+place.reviews[0].rating+' Star</b></p>'+
		  '<p><b>'+place.reviews[1].author_name+' </b>"'+place.reviews[1].text+'"<b>Rating '+place.reviews[1].rating+' Star</b></p>'+
		  '<p><b>'+place.reviews[2].author_name+' </b>"'+place.reviews[2].text+'"<b>Rating '+place.reviews[2].rating+' Star</b></p>'+
		  '<p>'+place.international_phone_number+'</p>'+ 
		  '<p><a href='+place.website+' target="blank">'+''+place.website+'</a> '+'</p>'+
		  '</div>'+
		  '</div>';


		  var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 800
		  });

	   
	  google.maps.event.addListener(itinerary_marker, 'click', function() {
		infowindow.open(map, this);
		});

		

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

/**
 * Function to show the map panel and hide the form panel on mobile.
 */
$('.toMap').click(function() {
	$('#panelForm').removeClass('showActive');
	$('#panelForm').addClass('hideInactive');
	$('#map').removeClass('hideInactive');
	$('#map').addClass('showActive');
	$('#btnShowForm').show();
	
	//Resetting maps
	var center = map.getCenter();
	google.maps.event.trigger(map, 'resize');
	map.setCenter(center);
});

/**
 * Function to show the form panel and hide the map panel on mobile.
 */
$('.btnBackToForm').click(function() {
	$('#panelForm').removeClass('hideInactive');
	$('#panelForm').addClass('showActive');
	$('#map').removeClass('showActive');
	$('#map').addClass('hideInactive');
	$('#btnShowForm').hide();
});

google.maps.event.addDomListener(window, 'load', initialize);