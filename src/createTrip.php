<?php 
session_start();
$dbuser = "arholt";
$dbpass = "sit203"; 
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


if($UserName == null || $endTime == null || $startTime == null) ;
else 
	{
		if($AmPm =="am" && $sAmPm == "am")
		{
		$strSQL="INSERT INTO TP_Trip VALUES (tripID_seq.nextval, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI AM'))";
		}
				else if($AmPm =="am" && $sAmPm == "pm")
		{
		$strSQL="INSERT INTO TP_Trip VALUES (tripID_seq.nextval, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI AM'))";
		}
				else if($AmPm =="pm" && $sAmPm == "pm")
		{
		$strSQL="INSERT INTO TP_Trip VALUES (tripID_seq.nextval, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI PM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI PM'))";
		}
				else if($AmPm =="pm" && $sAmPm == "am")
		{
		$strSQL="INSERT INTO TP_Trip VALUES (tripID_seq.nextval, to_timestamp('$startTime' , 'YYYY-MM-DD HH:MI AM'),to_timestamp('$endTime' , 'YYYY-MM-DD HH:MI PM'))";
		}				
		$stmt = oci_parse($connect,$strSQL);
 		oci_execute($stmt);
		
		$strSQL="INSERT INTO TP_CustomerTrip VALUES(customerTripID_seq.nextval,:username, tripID_seq.currval)";

		$stmt = oci_parse($connect,$strSQL);
		oci_bind_by_name($stmt, ":username", $UserName);

 		oci_execute($stmt);
		
		$_SESSION['tripID'] = "set";
 		header("location:itinerary.php");
		
	}
	
 ?>
 