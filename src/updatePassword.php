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
	$Password = $_POST["PasswordC"];
	$NewPassword = $_POST['PasswordN'];
	$query= "SELECT * FROM TP_Accounts WHERE UserName='$UserName'" ;
	$stsm = oci_parse($connect, $query);
	oci_execute($stsm);
	$usernameCorrect=false;
	//echo "<BR><BR>".$stsm."<BR><BR>" ;
	while (oci_fetch($stsm))
	{
		$UserNameCheck=oci_result($stsm, 'USERNAME');
		if($UserName == $UserNameCheck)
		{
			$usernameCorrect=true;
		}	
	}
	if($Password!=NULL &&$usernameCorrect==true)
	{
		$query= "SELECT Password FROM TP_Accounts WHERE UserName='$UserName'" ;
		$stsm = oci_parse($connect, $query);
		oci_execute($stsm);
			if(oci_fetch($stsm))
			{
				if($NewPassword!=NULL)
				{
					$pattern=$pattern='/^[a-zA-Z0-9 -\']{7,100}+$/';
					if (preg_match($pattern,$NewPassword))
					{
						$query= "UPDATE TP_Accounts SET Password = '$NewPassword' WHERE UserName='$UserName'" ;
						$stsm = oci_parse($connect, $query);
						oci_execute($stsm);
						$_SESSION['passwordChange'] = "yes";
				 		header("location:settings.php");
					}
				}
	 	}
 } 
 }
// else echo "Username not set ";
header("location:settings.php");
?>