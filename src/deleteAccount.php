<?php 
session_start();
$dbuser = "arholt";
$dbpass = "sit203"; 
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);

if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}
 
 if (isset($_SESSION["username"]))
 {
	$UserName = $_SESSION["username"];
	$query= "DELETE FROM TP_Accounts WHERE UserName='$UserName'" ;
	$stsm = oci_parse($connect, $query);
	oci_execute($stsm);
	session_destroy();
	header("location:login.php");
 }
 else 
 {
header("location:settings.php");
 }
?>