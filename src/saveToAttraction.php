<?php
$dbuser = "jyapi";
$dbpass = "15982749273"; 
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
	if ($attraction) {
		$items = explode(',',$attraction);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $address) {

$Duration = $_POST["duration"];
$StartTimeTemp = $_POST["start"];


if($StartTimeTemp !=null)
{
$pieces = explode(" ", $StartTimeTemp);
$day= $pieces[0];
$tempMonth = $pieces[1];
$year = $pieces[2];
$timeWhole = $pieces[4];
$AmPm = $pieces[5];

if($tempMonth !=null)
{

    if($tempMonth =="January")
        $month="01";


      if($tempMonth == "February")
        $month="02";
       
      else if($tempMonth == "March")
        $month="03";
        
       else if($tempMonth ==  "April")
        $month="04";
       
    else  if($pieces[1] ==  "May")
        $month="05";
      
   else if($pieces[1] == "June")
        $month="06";
     
     else  if($pieces[1] == "July")
        $month="07";
     
    else  if($pieces[1] ==  "August")
        $month="08";
     
    else  if($tempMonth == "September")
        $month="09";

    else  if($tempMonth == "October")
        $month="10";
     else if($pieces[1] ==  "November")
        $month="11";
  
   else if($pieces[1] == "December")
        $month="12";
}
$startTime = $year."-".$month."-".$day." ". $timeWhole. " " . $AmPm;
$sAmPm = $AmPm;
}

if($AmPm =="am"){
$sql1 = "insert into TP_cusAttraction(attractionId, tripID, attractionAddress, StartTime, duration) values (attractionId_seq.nextval , :TripID, :AttractionAddress, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM'), :Duration)";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		oci_bind_by_name($stmt1, ":TripID", $tripID);
		oci_bind_by_name($stmt1, ":AttractionAddress", $address );
		oci_bind_by_name($stmt1, ":Duration", $Duration);
		
			oci_execute($stmt1); 
}
if($AmPm =="pm"){
	$sql1 = "insert into TP_cusAttraction(attractionId, tripID, attractionAddress, StartTime, duration) values (attractionId_seq.nextval , :TripID, :AttractionAddress, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM'), :Duration)";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		oci_bind_by_name($stmt1, ":TripID", $tripID);
		oci_bind_by_name($stmt1, ":AttractionAddress",$address );
		oci_bind_by_name($stmt1, ":Duration", $Duration);
		
			oci_execute($stmt1);
	
}			
		}
	}
	
	$hotel = $_SESSION['hotel'];
	if ($hotel) {
		$items = explode(',',$hotel);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $address) {
		$Duration = $_POST["duration"];
        $StartTimeTemp = $_POST["start"];
		if($StartTimeTemp !=null)
         {
$pieces = explode(" ", $StartTimeTemp);
$day= $pieces[0];
$tempMonth = $pieces[1];
$year = $pieces[2];
$timeWhole = $pieces[4];
$AmPm = $pieces[5];

if($tempMonth !=null)
{

    if($tempMonth =="January")
        $month="01";


      if($tempMonth == "February")
        $month="02";
       
      else if($tempMonth == "March")
        $month="03";
        
       else if($tempMonth ==  "April")
        $month="04";
       
    else  if($pieces[1] ==  "May")
        $month="05";
      
   else if($pieces[1] == "June")
        $month="06";
     
     else  if($pieces[1] == "July")
        $month="07";
     
    else  if($pieces[1] ==  "August")
        $month="08";
     
    else  if($tempMonth == "September")
        $month="09";

    else  if($tempMonth == "October")
        $month="10";
     else if($pieces[1] ==  "November")
        $month="11";
  
   else if($pieces[1] == "December")
        $month="12";
}
$startTime = $year."-".$month."-".$day." ". $timeWhole. " " . $AmPm;
$sAmPm = $AmPm;
}

	if($AmPm =="am"){
			$sql2 = "insert into TP_cusHotel(hotelId, tripID, hotelAddress, StartTime, duratione) values (hotelId_seq.nextval, :TripID, :HotelAddress, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM'), :Duration)";
						
			$stmt2= oci_parse($connect, $sql2); 
  
			if(!$stmt2)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			  oci_bind_by_name($stmt2, ":TripID", $tripID);
		oci_bind_by_name($stmt2, ":HotelAddress", $address);
		oci_bind_by_name($stmt2, ":Duration", $Duration);
			oci_execute($stmt2); 
	}
	if($AmPm =="pm"){
		$sql2 = "insert into TP_cusHotel(hotelId, tripID, hotelAddress, StartTime, duratione) values (hotelId_seq.nextval, :TripID, :HotelAddress, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM'), :Duration)";
						
			$stmt2= oci_parse($connect, $sql2); 
  
			if(!$stmt2)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			  oci_bind_by_name($stmt2, ":TripID", $tripID);
		oci_bind_by_name($stmt2, ":HotelAddress", $address);
		oci_bind_by_name($stmt2, ":Duration", $Duration);
			oci_execute($stmt2); 
	}
	}
	}
$resturant = $_SESSION['resturant'];
	if ($resturant) {
		$items = explode(',',$resturant);
		$contents = array();
		foreach ($contents as $address) {
			
			$Duration = $_POST["duration"];
$StartTimeTemp = $_POST["start"];


if($StartTimeTemp !=null)
{
$pieces = explode(" ", $StartTimeTemp);
$day= $pieces[0];
$tempMonth = $pieces[1];
$year = $pieces[2];
$timeWhole = $pieces[4];
$AmPm = $pieces[5];

if($tempMonth !=null)
{

    if($tempMonth =="January")
        $month="01";


      if($tempMonth == "February")
        $month="02";
       
      else if($tempMonth == "March")
        $month="03";
        
       else if($tempMonth ==  "April")
        $month="04";
       
    else  if($pieces[1] ==  "May")
        $month="05";
      
   else if($pieces[1] == "June")
        $month="06";
     
     else  if($pieces[1] == "July")
        $month="07";
     
    else  if($pieces[1] ==  "August")
        $month="08";
     
    else  if($tempMonth == "September")
        $month="09";

    else  if($tempMonth == "October")
        $month="10";
     else if($pieces[1] ==  "November")
        $month="11";
  
   else if($pieces[1] == "December")
        $month="12";
}
$startTime = $year."-".$month."-".$day." ". $timeWhole. " " . $AmPm;
$sAmPm = $AmPm;
}
		if($AmPm =="am"){	
			$sql3 = "insert into TP_cusresturant(resturantId, tripID, restaurantAddress, StartTime, duration) values (resturantId_seq.nextval, :TripID, :ResturantAddress, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM'), :Duration )";
			$stmt3 = oci_parse($connect, $sql3); 
  
			if(!$stmt3)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			  oci_bind_by_name($stmt3, ":TripID", $tripID);
		oci_bind_by_name($stmt3, ":ResturantAddress", $address );
		oci_bind_by_name($stmt3, ":Duration", $Duration);
	oci_execute($stmt3); 
		}
		if($AmPm =="am"){
			$sql3 = "insert into TP_cusresturant(resturantId, tripID, restaurantAddress, StartTime, duration) values (resturantId_seq.nextval, :TripID, :ResturantAddress, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM'), :Duration )";
			$stmt3 = oci_parse($connect, $sql3); 
  
			if(!$stmt3)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			  oci_bind_by_name($stmt3, ":TripID", $tripID);
		oci_bind_by_name($stmt3, ":ResturantAddress", $address);
		oci_bind_by_name($stmt3, ":Duration", $Duration);
	oci_execute($stmt3); 
			
		}
	}
	}
?>