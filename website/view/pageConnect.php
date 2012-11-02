<?php

include "../control/tryconnect.php";

echo '<!DOCTYPE html>
<html>
 

	<head>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>
			Connection
		</title>
		<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>
	';
 
$conn= new tryconnect();

echo $conn->tryConnect();

echo "</html>";