<?php

$value=$_GET['q'];
//$value="attraction&Melbourne Zoo, Elliott Avenue, Parkville, Victoria, Australia&3";
list($search,$address,$TripID)=explode('|',$value,3);


$dbuser = "jyapi";
$dbpass = "15982749273"; 
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);
if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}

echo $search;
echo $address;
echo $TripID;
if ($search == "attraction"){
$query = "INSERT INTO TP_cusAttraction (attractionId, tripID, attractionAddress) VALUES (attractionId_seq.nextval,:TripID,:AttractionAddress)";
		$stmt = oci_parse($connect,$query);
		
		oci_bind_by_name($stmt, ":TripID", $TripID);
   		oci_bind_by_name($stmt, ":AttractionAddress", $address);
   		
		
		oci_execute($stmt);
}
if ($search == "hotel"){
$query = "INSERT INTO TP_cusHotel (hotelId, tripID, hotelAddress) VALUES (hotelId_seq.nextval,:TripID,:AttractionAddress)";
		$stmt = oci_parse($connect,$query);
		
		oci_bind_by_name($stmt, ":TripID", $TripID);
   		oci_bind_by_name($stmt, ":AttractionAddress", $address);
   		
		
		oci_execute($stmt);
}
if ($search == "resturant"){
$query = "INSERT INTO TP_cusresturant (resturantId, tripID, restaurantAddress) VALUES (resturantId_seq.nextval,:TripID,:AttractionAddress)";
		$stmt = oci_parse($connect,$query);
		
		oci_bind_by_name($stmt, ":TripID", $TripID);
   		oci_bind_by_name($stmt, ":AttractionAddress", $address);
   		
		
		oci_execute($stmt);
}

/*////if we are search attraction
if ($search == "attraction"){
$attraction = $_SESSION['attraction'];
switch ($action) {
	case 'wasDropped':
	
		if ($attraction) {
			$attraction .= ','.$_GET[$address];
			echo "hello";
		} else {
			$attraction = $_GET[$address];
			echo "hello";
		}
		break;
}
$_SESSION['attraction'] = $attraction;


	}	


////if we are search hotel
if ($search == "hotel"){		
$hotel = $_SESSION['hotel'];
switch ($action) {
	case 'wasDropped':
		if ($hotel) {
			$hotel .= ','.$_GET[$address];
		} else {
			$hotel = $_GET[$address];
		}
		break;
}
$_SESSION['hotel'] = $hotel;
}

////if we are search resturant
if ($search == "resturant"){

$resturant = $_SESSION['resturant'];


switch ($action) {
	case 'wasDropped':
		if ($resturant) {
			$resturant .= ','.$_GET[$address];
		} else {
			$resturant = $_GET[$address];
		}
		break;
}
$_SESSION['resturant'] = $resturant;


}*/	
		
?>