<?php 
session_start();
$dbuser = "jyapi";
$dbpass = "15982749273"; 
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);

if (!$connect) 
{
	echo "An error occurred connecting to the database";
	exit;
}
if($FirstName==NULL && $LastName==NULL && $UserName==NULL &&  $Password==NULL &&  $Email==NULL);
else
{
 	// *******************Validate data entered*********************** 
 	if($FirstName!=Null)
	{
		$pattern='/^[a-zA-Z \'-]+$/';

		if (preg_match($pattern,$FirstName))
		{
			$FNValid=true;
		}
		else echo"<script type='text/javascript'>alert(\"Invalid input - First name was not input correctly\");</script>";
	}
	else echo"<script type='text/javascript'>alert(\"Invalid input - First name cannot be left blank\");</script>";
	// *******************Validate data entered***********************
	if($LastName!=Null)
	{
		$pattern='/^[a-zA-Z \'-]+$/';

		if (preg_match($pattern,$LastName))
		{
			$LNValid=true;
		}
		else echo "<script type='text/javascript'>alert(\"Invalid input - Last name was not input correctly\");</script>";
	}
	else echo "<script type='text/javascript'>alert(\"Invalid input - Last name cannot be left blank\");</script>";
	// *******************Validate data entered***********************
	if($UserName!=Null)
	{
		$pattern='/^[a-zA-Z0-9._-]{8,24}+$/';

		if (preg_match($pattern,$UserName))
		{
			
			$UserName=$_POST['UserName'];
			
			
			$query= "SELECT * FROM TP_Accounts WHERE UserName='$UserName'" ;
			//WHERE UserName='$UserName'"
			$stsm = oci_parse($connect, $query);
			oci_execute($stsm);
			$usernameCorrect=false;
			 if(oci_fetch($stsm))
			 {
				echo "<script type='text/javascript'>alert(\"Username is already in use -  try adding a number or underscore \");</script>";
			 }
			else 
			{
					$UNValid=true;
			}
		} 
			
		else echo"<script type='text/javascript'>alert(\"Invalid input - Username was not input correctly\");</script>";
	}
	else echo"<script type='text/javascript'>alert(\"Invalid input - Username cannot be left blank\");</script>";
  
 	// *******************Validate data entered***********************
	if($Password!=Null)
	{
	$pattern='/^[a-zA-Z0-9 -\']{7,100}+$/';

	if (preg_match($pattern,$Password))
		{
			
			if($PasswordMatch!=Null)
				{
					if ($Password == $PasswordMatch)
					{
						$PassValid=true;
					}
					else 
					{
						echo"<script type='text/javascript'>alert(\"Invalid input - Passwords do not match\");</script>";
						$PassValid =false;
					}
				}
				else echo"<script type='text/javascript'>alert(\"Invalid input -  Retype password  can not be left blank\");</script>";
		}
		else echo"<script type='text/javascript'>alert(\"Invalid input - Password was not input correctly\");</script>";
	}
	else echo"<script type='text/javascript'>alert(\"Invalid input - Password cannot be left blank\");</script>";
	

	

	// *******************Validate data entered***********************
	if($Email!=Null)
	{
		$pattern='/^[a-zA-Z0-9._-]+@+[a-zA-Z0-9-]+\.+[a-zA-Z.]{2,6}$/';
		if (preg_match($pattern,$Email))
		{
			$EmValid=true;
		}
		else echo"<script type='text/javascript'>alert(\"Invalid input - Email was not input correctly\");</script>";
	}
	else echo"<script type='text/javascript'>alert(\"Invalid input - Email cannot be left blank\");</script>";

	if($FNValid==true && $LNValid==true && $UNValid==true && $PassValid==true && $EmValid==true )
  	{
	  	$valid=true;
  	}
	if($valid)
  	{
		$strSQL="INSERT INTO TP_Accounts VALUES
		(:FirstName,:LastName,:UserName,:Password,:Email)";

		$stmt = oci_parse($connect,$strSQL);

			

		//   oci_bind_by_name($stmt, ":RC_id", $RC_id);
   		oci_bind_by_name($stmt, ":FirstName", $FirstName);
   		oci_bind_by_name($stmt, ":LastName", $LastName);
   		oci_bind_by_name($stmt, ":UserName", $UserName);
   		oci_bind_by_name($stmt, ":Password", $Password);              
   		oci_bind_by_name($stmt, ":Email", $Email);    

 		oci_execute($stmt);
		$_SESSION["username"] = $UserName;
		$_SESSION["firstname"] = $FirstName;
 		header("location:map.php");
 
	}
}
 ?>