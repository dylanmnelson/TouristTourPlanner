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

$StartTimeTemp = date("yy-mm-dd", time());
$Duration = "2";
$sql1 = "UPDATE TP_cusAttraction SET StartTime = '$StartTimeTemp' WHERE tripID= '$tripID '";
			$stmt1 = oci_parse($connect, $sql1);
		if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt1); 
			////////////////////////
			
$sql2 = "UPDATE TP_cusAttraction SET duration = '$Duration' WHERE tripID= '$tripID '";
			$stmt2 = oci_parse($connect, $sql2); 
  
			if(!$stmt2)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		
			oci_execute($stmt2);
	//////////////////////////////////////
$sql3 = "UPDATE TP_cusHotel SET duration = '$Duration' WHERE tripID= '$tripID'";
						
			$stmt3 = oci_parse($connect, $sql3); 
  
			if(!$stmt3)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
				
			oci_execute($stmt3); 
	///////////////////////////////////////////////////////////////////////////////		
$sql4 = "UPDATE TP_cusHotel SET StartTime = '$StartTimeTemp' WHERE tripID= '$tripID'";
			$stmt4 = oci_parse($connect, $sql4); 
			if(!$stmt4)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt4); 
//////////////////////////////////////////////////////////////////////
 $sql5 = "UPDATE TP_cusresturant SET StartTime = '$StartTimeTemp' WHERE tripID= '$tripID'";
			
						
			$stmt5 = oci_parse($connect, $sql5); 
  
			if(!$stmt5)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
				
			oci_execute($stmt5);
/////////////////////////////////////////////////////////////////////////
 $sql6 = "UPDATE TP_cusresturant SET duration = '$Duration' WHERE tripID= '$tripID'";
			
						
			$stmt6 = oci_parse($connect, $sql6); 
  
			if(!$stmt6)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
				
			oci_execute($stmt6);
/////////////////////////////////////////////////			
			

foreach ($_POST as $key=>$value) {
	if (stristr($key,'AttractoinstartTime')) {
		$attractionId = str_replace('qty','',$key);
        $StartTimeTemp = $value;

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
$sql1 = "UPDATE TP_cusAttraction SET StartTime = 'to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM')' WHERE attractionId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		
			oci_execute($stmt1); 
}
if($AmPm =="pm"){
	$sql1 = "UPDATE TP_cusAttraction SET StartTime ='to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM')'  duration WHERE attractionId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		
			oci_execute($stmt1);
	
}			
		}
	if (stristr($key,'Attractoinduration')) {
		$attractionId = str_replace('qty','',$key);
        $Duration = $value;
     $sql1 = "UPDATE TP_cusAttraction SET duration = '$Duration' WHERE attractionId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
				
			oci_execute($stmt1); 

	}
	
	if (stristr($key,'hotelstartTime')) {
		$attractionId = str_replace('qty','',$key);
        $StartTimeTemp = $value;

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
$sql1 = "UPDATE TP_cusHotel SET StartTime = 'to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM')' WHERE hotelId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		
			oci_execute($stmt1); 
}
if($AmPm =="pm"){
	$sql1 = "UPDATE TP_cusHotel SET StartTime ='to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM')'  duration WHERE hotelId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		
			oci_execute($stmt1);
	
}			
		}
	if (stristr($key,'hotelduration')) {
		$attractionId = str_replace('qty','',$key);
        $Duration = $value;
     $sql1 = "UPDATE TP_cusHotel SET duration = '$Duration' WHERE hotelId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
				
			oci_execute($stmt1); 

	}
	
	if (stristr($key,'restaurantstartTime')) {
		$attractionId = str_replace('qty','',$key);
        $StartTimeTemp = $value;

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
$sql1 = "UPDATE TP_cusresturant SET StartTime = 'to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM')' WHERE resturantId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		
			oci_execute($stmt1); 
}
if($AmPm =="pm"){
	$sql1 = "UPDATE TP_cusresturant SET StartTime ='to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM')'  duration WHERE resturantId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
		
			oci_execute($stmt1);
	
}			
		}
	if (stristr($key,'restaurantduration')) {
		$attractionId = str_replace('qty','',$key);
        $Duration = $value;
     $sql1 = "UPDATE TP_cusresturant SET duration = '$Duration' WHERE resturantId= '$attractionId'";
			
						
			$stmt1 = oci_parse($connect, $sql1); 
  
			if(!$stmt1)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
				
			oci_execute($stmt1); 

	}
	
	}
	
//header("location:showTrip.php");

?>