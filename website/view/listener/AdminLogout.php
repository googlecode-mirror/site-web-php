<?php

include_once 'data/AdminDAO.php';

$admin = new AdminDAO();
session_destroy();
header("location:../index.php");
