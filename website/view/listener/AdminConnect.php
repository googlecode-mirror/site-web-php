<?php

include_once 'data/AdminDAO.php';

$admin = new AdminDAO();
session_destroy();
if($admin->isAdmin($_POST['login'], $_POST['password'])){
	session_start();
	$_SESSION['isAdmin'] = true ;
// 	session_close();
	header("location:../adminConsole.php");
}else header("location:../changes.php");
