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
<?php include_once 'control/navigationControls.php';?>
	
<html >
	<head>
		<meta name="keywords" content="<?php echo $keywords ?> " />
		<meta name="description" content="<?php echo $description ?> " />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>
			<?php echo $title ?>
		</title>
		<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
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
					<form action="" method="post">
						<div>
							<input class="text" name="search" size="32" maxlength="64" />
						</div>
					</form>
				</div>
				<div id="nav">
					<ul>
						<li class="first">
								<?php 
								$url= $catControl->getLinkCategory("News"); 
								?>
				
							<a href="<?php echo $url ?>">Articles</a>
							
						</li>
						<li>
						<?php 
								$url= $catControl->getLinkCategory("experts"); 
								?>
				
							<a href="<?php echo $url ?>">Experts</a>
						</li>
						<li>
						
							<?php 
								$url= $catControl->getLinkCategory("Newbies"); 
								?>
				
							<a href="<?php echo $url ?>">Débutants</a>
						</li>
						<li>
						
							<?php 
								$url= $catControl->getLinkCategory("Loisirs"); 
								?>
				
							<a href="<?php echo $url ?>">Pour se détendre ..</a>
						 
						</li>

						<li class="last">
							<a href="#">Contact</a>
						</li>
					</ul><br class="clear" />
				</div>
			</div>
