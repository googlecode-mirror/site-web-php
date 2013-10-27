<?php

include_once 'data/AdminDAO.php';

$admin = new AdminDAO();
if($admin->isAdmin($_POST['login'], $_POST['password'])){
	session_start();
	$_SESSION['isAdmin'] = true ;
	header("location:../adminConsole.php");
}else header("location:../changes.php");
