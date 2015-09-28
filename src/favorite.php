<?php
$dbuser = "jyapi";
$dbpass = "1982749273"; 
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);
if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}
$UserName=$_SESSION["username"]
$favorite=$_GET["value"];

$strSQL="INSERT INTO TP_favorite (userName, favorite) VALUES
		(:UserName,:Favorite)";

		$stmt = oci_parse($connect,$strSQL);
		
		oci_bind_by_name($stmt, ":UserName", $UserName);
   		oci_bind_by_name($stmt, ":Favorite", $favorite);
   		
		
		oci_execute($stmt);
		

		
?>