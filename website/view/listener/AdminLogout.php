<?php

// include_once 'data/AdminDAO.php';

// $admin = new AdminDAO();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['isAdmin'] = false;
// session_destroy();
header("location:../index.php");
