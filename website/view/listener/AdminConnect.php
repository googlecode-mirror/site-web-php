<?php

include_once 'data/AdminDAO.php';

$admin = new AdminDAO();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($admin->isAdmin($_POST['login'], $_POST['password'])){
	$_SESSION['isAdmin'] = true ;
	header("location:../adminConsole.php");
}else header("location:../changes.php");

