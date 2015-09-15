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

  //new direction service
  directionsDisplay = new google.maps.DirectionsRenderer();
  directionsDisplay.setMap(map);

  //new transit layer
  var transitLayer = new google.maps.TransitLayer();
  transitLayer.setMap(map);

  
  var input_start = /** @type {HTMLInputElement} */(
      document.getElementById('start'));
	  
  var input_end = /** @type {HTMLInputElement} */(
      document.getElementById('end'));
	  
  //var mode = document.getElementById('mode');
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(mode);

  var autocomplete_start = new google.maps.places.Autocomplete(input_start);
  var autocomplete_end = new google.maps.places.Autocomplete(input_end);
  
  autocomplete_start.bindTo('bounds', map);
  autocomplete_end.bindTo('bounds', map);  

  /*
  infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });
*/
  //google.maps.event.addListener(autocomplete_start, 'place_changed', createMarker);
  //google.maps.event.addListener(autocomplete_end, 'place_changed', createMarker);

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  /*
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
  */
}

// Retrieve the start and end locations and create
  // a DirectionsRequest using DRIVING directions.
function calcRoute() {
  start = document.getElementById('start').value;
  end = document.getElementById('end').value;
  var selectedMode = document.getElementById('mode').value;
  //alert("selected mode:"+ selectedMode);

  //get the waypoints selected
  //The maximum allowed waypoints is 8, plus the origin, and destination. 
  //Waypoints are not supported for transit directions.
  var waypts = [];
  var checkboxArray = document.getElementById('waypoints');
  for (var i = 0; i < checkboxArray.length; i++) {
    if (checkboxArray.options[i].selected == true) {
      waypts.push({
          location:checkboxArray[i].value,
          stopover:true});
    }
  }
  //alert("get waypoints");
  //get the travel mode
  mode = google.maps.TravelMode[selectedMode];
  //alert("set mode");
  
  //construct direction request 
  //for transit mode, get optimized way points order first, then split request
  if ((selectedMode =="TRANSIT") && (waypts.length != 0)) {
	//set the travel mode to driving first to get the optimized traval order of waypoints
	transit_flag = true;
	mode = google.maps.TravelMode.DRIVING; 
	//alert("set transit flag to true and mode to driving");
  }
  //alert("start:"+start);
  //alert("end:"+end);
  
  var request = {
      origin:start,
      destination:end,
	  
	  //added for waypoints
	  waypoints: waypts,
	  //(This optimization is an application of the Travelling Salesman Problem.) 
	  //All waypoints must be stopovers for the Directions service to optimize their route.
      optimizeWaypoints: true,

	  // create a DirectionsRequest using WALKING directions.
	  //travelMode: google.maps.TravelMode.WALKING
      //travelMode: google.maps.TravelMode.DRIVING
	  
	  // Note that Javascript allows us to access the constant
      // using square brackets and a string value as its
      // "property."
      travelMode: mode

  };
  
  alert(transit_flag);
  
  if (!transit_flag) { //if travel mode is NOT transit, call default callback function
		//alert("enter default callback");
		directionsService.route(request, callBack_default);
		//directionsService.route(request, callBack);
  } else {
		//alert("enter transit callback");
		directionsService.route(request, callBack_transit);
  }
  
  //transit_flag = false;
  
}
/*
function callBack(response, status) {
alert("hello");
}
*/

function callBack_default(response, status) {
	//alert("callback default entered");
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);	  
	  //added for waypoints
	  //alert("status ok");
	  var route = response.routes[0];	  
      var summaryPanel = document.getElementById('directions_panel');
      summaryPanel.innerHTML = '';
	  //alert("default call back mode:"+ mode);
		
	  directionsDisplay.setDirections(response);
	  // For each route, display summary information.
	  for (var i = 0; i < route.legs.length; i++) {
		var routeSegment = i + 1;
		summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment + '</b><br>';
		summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
		summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
		summaryPanel.innerHTML += route.legs[i].distance.text + '<br>';	
		//duration info added by Shang 
		summaryPanel.innerHTML += route.legs[i].duration.text + '<br><br>';					
	  } //end of for
    } else{
		alert(status);
	  }
} //end of function

function callBack_transit(response, status) {
	//alert("callback transit entered");
	//alert(transit_flag);
		
	var combinedResults;
    var directionsResultsReturned = 0;
	
    if (status == google.maps.DirectionsStatus.OK) {
		//directionsDisplay.setDirections(response);	  
		//added for waypoints
		//alert("transit status ok");
		var route = response.routes[0];	  
		//var summaryPanel = document.getElementById('directions_panel');
		//summaryPanel.innerHTML = '';
		//alert("mode:"+ mode);
		//waypoint_order contains an array indicating the order of any waypoints in the calculated route. 
		//This array may contain an altered order if the DirectionsRequest was passed optimizeWaypoints: true.
		//alert("transit");
		
		//var start_waypoints = start; //initialize to start
		//var end_waypoints = end; //initialize to end
		//alert("start_waypoints:"+start);
		//alert("end_waypoints:"+end);
		alert("route.legs.length:"+ route.legs.length);
		var request_waypoints =[];
		
		// For each route leg, get way points information.
	    for (var j = 0; j < route.legs.length; j++) {
			 alert("j:"+j);
			 alert("origin:"+route.legs[j].start_address);
			 alert("destination:"+route.legs[j].end_address);					 
			 request_waypoints[j] = {
				  origin:route.legs[j].start_address,
				  destination:route.legs[j].end_address,
				  travelMode: google.maps.TravelMode.TRANSIT
			  };
			//alert("after setting a waypoint leg");
		} //end of for j
		
			//get from https://lemonharpy.wordpress.com/2011/12/15/working-around-8-waypoint-limit-in-google-maps-directions-api/
			//24/02/2015
		for (var i=0; i< request_waypoints.length; i++) {
			directionsService.route(request_waypoints[i], function (response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
				
					var route_transit = response.routes[0];	  
					var summaryPanel = document.getElementById('directions_panel');
									  
					if (directionsResultsReturned == 0) { // first bunch of results in. new up the combinedResults object
						alert("request_waypoints[i]:"+i);
						alert("directionsResultsReturned:"+directionsResultsReturned);
						combinedResults = response;
						directionsResultsReturned++;
						summaryPanel.innerHTML = '';
						alert("clean up the summaryPanel if no response returned");
						alert("directionsResultsReturned increased by 1:"+directionsResultsReturned);
						
						//for (var m = 0; m < route_transit.legs.length; m++) {
							//alert("m: route_transit.leg :"+ m);
							//alert("directionsResultsReturned in m for loop:"+directionsResultsReturned);
							summaryPanel.innerHTML += '<b>Route Segment: ' + directionsResultsReturned +'</b><br>';
							summaryPanel.innerHTML += route_transit.legs[0].start_address + ' to ';
							summaryPanel.innerHTML += route_transit.legs[0].end_address + '<br>';
							summaryPanel.innerHTML += route_transit.legs[0].distance.text + '<br>';	
							//duration info added by Shang 
							summaryPanel.innerHTML += route_transit.legs[0].duration.text + '<br><br>';	
							alert("directionsResultsReturned & route info:"+directionsResultsReturned+"<br>"+summaryPanel.innerHTML);
						//}
						
					} else {
						// only building up legs, overview_path, and bounds in my consolidated object. This is not a complete
						// directionResults object, but enough to draw a path on the map, which is all I need
						combinedResults.routes[0].legs = combinedResults.routes[0].legs.concat(route_transit.legs);
						//combinedResults.routes[0].overview_path = combinedResults.routes[0].overview_path.concat(route_transit.overview_path);
	 
						combinedResults.routes[0].bounds = combinedResults.routes[0].bounds.extend(route_transit.bounds.getNorthEast());
						combinedResults.routes[0].bounds = combinedResults.routes[0].bounds.extend(route_transit.bounds.getSouthWest());
						
						directionsResultsReturned++;
						
						//for (var n = 0; n < route_transit.legs.length; n++) {
							//alert("n: route_transit.leg :"+ n);
							//alert("directionsResultsReturned in n for loop:"+directionsResultsReturned);
							summaryPanel.innerHTML += '<b>Route Segment: ' + directionsResultsReturned +'</b><br>';
							summaryPanel.innerHTML += route_transit.legs[0].start_address + ' to ';
							summaryPanel.innerHTML += route_transit.legs[0].end_address + '<br>';
							summaryPanel.innerHTML += route_transit.legs[0].distance.text + '<br>';	
							//duration info added by Shang 
							summaryPanel.innerHTML += route_transit.legs[0].duration.text + '<br><br>';	
							alert("directionsResultsReturned & route info:"+directionsResultsReturned+"<br>"+summaryPanel.innerHTML);
						//}
						
						
						if (directionsResultsReturned == route.legs.length) { // we've received all the results. put to map
							alert("received all the results. directionsResultsReturned:"+directionsResultsReturned);
							directionsDisplay.setDirections(combinedResults);
						}
					}
				} else{
					alert(status);
				}
		    });
			
		} //end of for i
			
			// we've received all the results. put to map
            //directionsDisplay.setDirections(combinedResults);
			

/*
	    for (var i=0; i< request_waypoints.length; i++) {
			alert("enter a loop to split transit request");
			directionsService.route(request_waypoints[i], function (response, status){
				//alert("callback default entered");
				if (status == google.maps.DirectionsStatus.OK) {
				  //directionsDisplay.setDirections(response);	  
				  //added for waypoints
				  alert("status ok");
				  var route = response.routes[0];	  
				  var summaryPanel = document.getElementById('directions_panel');
				  if (i==0) {
					summaryPanel.innerHTML = '';
				  }
				  alert("i:"+ i);
					
				  directionsDisplay.setDirections(response);
				  // For each route, display summary information.
				  for (var m = 0; m < route.legs.length; m++) {
					var routeSegment = i * route.legs.length + m + 1;
					summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment + '</b><br>';
					summaryPanel.innerHTML += route.legs[m].start_address + ' to ';
					summaryPanel.innerHTML += route.legs[m].end_address + '<br>';
					summaryPanel.innerHTML += route.legs[m].distance.text + '<br>';	
					//duration info added by Shang 
					summaryPanel.innerHTML += route.legs[m].duration.text + '<br><br>';					
				  } //end of for
				} else{
					alert(status);
				}
			});
			//directionsDisplay.setDirections(response);				
		}
*/
		transit_flag=false;
		//alert("transit_flag is set to false at the end");
				
    } else {//end of if status
		alert(status);
		alert("sth is wrong with the directionResult...");
	}
} //end of function
  
google.maps.event.addDomListener(window, 'load', initialize);