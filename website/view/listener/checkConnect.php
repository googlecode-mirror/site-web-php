<?php


	session_start();
	$isAdmin=false;
	if(isset($_SESSION['isAdmin'])){
		if($_SESSION['isAdmin']==true){
			$isAdmin=true;	
		}
	}
	if(!$isAdmin){
		header("location:../news.php");
	}
 /* Redirect browser */
?>
