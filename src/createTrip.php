<?php 
session_start();
$dbuser = "jyapi";
$dbpass = "15982749273"; 
$db = "SSID";
$connect = oci_connect($dbuser, $dbpass, $db);

if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}

 if (isset($_SESSION["username"])){
 $UserName = $_SESSION["username"];
 }



 $EndTimeTemp = $_POST["end"];
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
if($EndTimeTemp !=null)
{
$pieces = explode(" ", $EndTimeTemp);
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
$endTime = $year."-".$month."-".$day." ". $timeWhole. " " . $AmPm;
}

 $query_count = "SELECT max(tripID) FROM TP_trips";

  // check the sql statement for errors and if errors report them 
  $stmt = oci_parse($connect, $query_count); 

  if(!$stmt)  {
    echo "An error occurred in parsing the sql string.\n"; 
    exit; 
  }
  oci_execute($stmt);
   if (oci_fetch_array($stmt))  {
	
	$tripID = oci_result($stmt,1);//returns the data for column 1 
  } else {
	echo "An error occurred in retrieving order id.\n"; 
	exit; 
  }

  $tripID++;
  
if($UserName == null || $endTime == null || $startTime == null) ;
else 
	{
		if($AmPm =="am" && $sAmPm == "am")
		{
		$strSQL="INSERT INTO TP_trips VALUES (:TripID, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI AM'))";
		}
				else if($AmPm =="am" && $sAmPm == "pm")
		{
		$strSQL="INSERT INTO TP_trips VALUES (:TripID, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI AM'))";
		}
				else if($AmPm =="pm" && $sAmPm == "pm")
		{
		$strSQL="INSERT INTO TP_trips VALUES (:TripID, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI PM'))";
		}
				else if($AmPm =="pm" && $sAmPm == "am")
		{
		$strSQL="INSERT INTO TP_trips VALUES (:TripID, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI PM'))";
		}				
		$stmt = oci_parse($connect,$strSQL);
		oci_bind_by_name($stmt, ":TripID", $tripID);
 		oci_execute($stmt);
		
		$strSQL1="INSERT INTO TP_customerTrip VALUES(customerTripID_seq.nextval,:Username, :TripID)";

		$stmt1 = oci_parse($connect,$strSQL1);
        oci_bind_by_name($stmt1, ":Username", $UserName);
		oci_bind_by_name($stmt1, ":TripID", $tripID);
 		oci_execute($stmt1);
		
				
		$_SESSION["tripID"] = $tripID;
 		header("location:itinerary.php");
		
	}
	
 ?>
 