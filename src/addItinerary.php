<?php
$dbuser = "arholt";
$dbpass = "sit203"; 
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);
if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}
$UserName=$_SESSION["username"];
$tripID = $_SESSION["tripID"];

$attraction = $_SESSION['attraction'];
$action = $_GET['action'];

switch ($action) {
	case 'add':
		if ($attraction) {
			$attraction .= ','.$_GET['address'];
		} else {
			$attraction = $_GET['address'];
		}
		break;
}
$_SESSION['attraction'] = $attraction;

$attraction = $_SESSION['attraction'];
	if ($attraction) {
		$items = explode(',',$attraction);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $address) {
			$sql = "insert into TP_attraction values ";
			
						
			$stmt = oci_parse($connect, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 

			
		}
		
		
$hotel = $_SESSION['hotel'];
$action = $_GET['action'];

switch ($action) {
	case 'add':
		if ($hotel) {
			$hotel .= ','.$_GET['address'];
		} else {
			$hotel = $_GET['address'];
		}
		break;
}
$_SESSION['hotel'] = $hotel;

$hotel = $_SESSION['hotel'];
	if ($hotel) {
		$items = explode(',',$hotel);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $address) {
			$sql = "insert into TP_hotel values ";
						
			$stmt = oci_parse($connect, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 

			
		}

$resturant = $_SESSION['resturant'];
$action = $_GET['action'];

switch ($action) {
	case 'add':
		if ($resturant) {
			$resturant .= ','.$_GET['address'];
		} else {
			$resturant = $_GET['address'];
		}
		break;
}


$_SESSION['resturant'] = $resturant;

$resturant = $_SESSION['resturant'];
	if ($resturant) {
		$items = explode(',',$resturant);
		$contents = array();
		foreach ($contents as $address) {
			$sql = "insert into TP_resturant values ";
			$stmt = oci_parse($connect, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 

			
		}		
		
?>