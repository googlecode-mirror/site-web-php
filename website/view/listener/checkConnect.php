<?php

include_once 'data/AdminDAO.php';
$admin = new AdminDAO();
if($_SESSION['isAdmin'] == true){
	$isAdmin=true;
}else{
	header("location:../index.php");
}


?>
