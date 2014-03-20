<?php

include_once 'data/AdminDAO.php';
$admin = new AdminDAO();
if($_SESSION['isAdmin']){
	$isAdmin=true;
}else{
	header("location:../index.php");
}


?>
