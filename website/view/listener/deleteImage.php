<?php 
	include_once 'control/ArticleControls.php';
	ArticleControls::deleteImg();
	header("location:../uploadImages.php");
?>