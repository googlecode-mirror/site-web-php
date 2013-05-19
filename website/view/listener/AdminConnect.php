<?php

include_once 'data/AdminDAO.php';

$admin = new AdminDAO();
if($admin->isAdmin($_POST['login'], $_POST['password'])){
	header("location:../Index.php");
}else header("location:../changes.php");
