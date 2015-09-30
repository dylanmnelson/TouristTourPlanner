<?php
$favorite1=$_GET['q'];
$arry = explode('1',$favorite1);
$favorite = $arry[1];
$UserName = $arry[0];
$dbuser = "jyapi";
$dbpass = "15982749273"; 
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);
if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}

$query = "INSERT INTO TP_favorite (favouritesId, userName, favorite) VALUES (favouritesId_seq.nextval,:UserName,:Favorite)";
		$stmt = oci_parse($connect,$query);
		
		oci_bind_by_name($stmt, ":UserName", $UserName);
   		oci_bind_by_name($stmt, ":Favorite", $favorite);
   		
		
		oci_execute($stmt);
		

		
?>