<?php

include_once 'data/AdminDAO.php';

$admin = new AdminDAO();
if(isset($_SESSION) ){
	session_destroy();
}
if($admin->isAdmin($_POST['login'], $_POST['password'])){
	$_SESSION['isAdmin'] = true ;
	header("location:../adminConsole.php");
}else header("location:../changes.php");

