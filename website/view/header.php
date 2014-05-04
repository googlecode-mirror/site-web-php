<!DOCTYPE html>
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Unofficial Channels
Description: A two-column, fixed-width design with a bright color scheme.
Version    : 1.0
Released   : 20120723
-->
<?php include_once 'control/navigationControls.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>

<html>
<head>
<meta name="keywords" content="<?php echo $keywords ?> " />
<meta name="description" content="<?php echo $description ?> " />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>

<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" href="http://yandex.st/highlightjs/8.0/styles/default.min.css">

<script> UPLOADCARE_PUBLIC_KEY = '81b1193e42c48525c5a4'; </script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>


</head>
<body>
	<div id="bg1"></div>
	<div id="bg2"></div>
	<?php  $catControl= new navigationControls();?>
	<div id="outer">
		<div id="header">
			<div id="logo">
				<h1>
					<a href="index.php">Programaniak</a>
				</h1>
			</div>
			<div id="search">
				<form action="listener/search.php" method="post">
					<div >
						<input class="text" name="search" size="32" maxlength="64" />
					</div>
				</form>
			</div>
			<div id="nav">
				<ul>
					<?php 
					$url= $catControl->generateMenu();
					echo $url;
					?>
					<li class="last"><a href="contact.php">Contact</a>
					</li>
				</ul>
				<br class="clear" />
			</div>
		</div>