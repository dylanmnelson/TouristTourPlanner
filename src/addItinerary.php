<?php
$value=$_GET["value"];
$arr=explode('&',$value);
$search = $arr[0];
$address =$arr[1];
$action = $arr[2];
////if we are search attraction
if ($search == "attraction"){
$attraction = $_SESSION['attraction'];
$action = $_GET['action'];

switch ($action) {
	case 'wasDropped':
		if ($attraction) {
			$attraction .= ','.$_GET[$address];
		} else {
			$attraction = $_GET[$address];
		}
		break;
}
$_SESSION['attraction'] = $attraction;


	}	


////if we are search hotel
if ($search == "hotel"){		
$hotel = $_SESSION['hotel'];
$action = $_GET['action'];

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
$action = $_GET['action'];

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


}	
		
?>