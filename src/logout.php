<?php
	// must have a session started 
	session_start();
    //destroy the session
session_destroy();
    //redirect the user to a default web page using header
    header("location:map.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>