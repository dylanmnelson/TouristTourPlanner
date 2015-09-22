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
	$Password = $_POST["Password"];
	$Email = $_POST['Email'];
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
			
			//echo " username correct";
			$usernameCorrect=true;
		}
		//else echo " error occured";
			
	}
	if($Password!=NULL &&$usernameCorrect==true)
	{
		$query= "SELECT Password FROM TP_Accounts WHERE UserName='$UserName'" ;
	//	echo " sql username select password".$query;
		$stsm = oci_parse($connect, $query);
		//echo "<BR><BR>".$connect."<BR><BR>" ;
		//echo "<BR><BR>".$query."<BR><BR>" ;
		oci_execute($stsm);
		//echo "<BR><BR>".$stsm."<BR><BR>" ;
		
			//echo " sql username select password".$query;
			
			if(oci_fetch($stsm))
			{ // echo " sql username select password 2".$query;
				
				if($Email!=NULL)
				{
					//echo " <BR> email not empty ";
					$pattern='/^[a-zA-Z0-9._-]+@+[a-zA-Z0-9-]+\.+[a-zA-Z.]{2,6}$/';
					if (preg_match($pattern,$Email))
					{
						$query= "UPDATE TP_Accounts SET Email = '$Email' WHERE UserName='$UserName'" ;
						//echo " <BR> sql update ".$query;
						$stsm = oci_parse($connect, $query);
						oci_execute($stsm);
						$_SESSION['emailChange'] = "yes";
				 		header("location:settings.php");
					}
				}
 

		//else echo "password check failed ";
	 	}
 }
// else echo "password is blank";
 
 }
// else echo "Username not set ";
header("location:settings.php");
?>