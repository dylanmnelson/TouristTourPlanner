var map;
var infowindow;

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

var start;
var end;
var mode;
var transit_flag=false;
	
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
	
}

$('.toMap').click(function() {
	$('#panelForm').removeClass('active');
	$('#panelForm').addClass('inactive');
	$('#map').removeClass('inactive');
	$('#map').addClass('active');
	
	//Resetting maps
	var center = map.getCenter();
	google.maps.event.trigger(map, 'resize');
	map.setCenter(center);
});

$('.btnBackToForm').click(function() {
	$('#panelForm').removeClass('inactive');
	$('#panelForm').addClass('active');
	$('#map').removeClass('active');
	$('#map').addClass('inactive');
});

google.maps.event.addDomListener(window, 'load', initialize);