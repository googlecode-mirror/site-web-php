<?php

include_once 'data/CategoryDAO.php';
include_once 'control/ArticleControls.php';
include_once 'business/Article.php';


if (session_status() == PHP_SESSION_NONE){
	session_start();
}
$categoryDao = new CategoryDao();
$articleController = new ArticleControls();
var_dump($_POST['category']);
$categoryId = $categoryDao->getIdForName($_POST['category']);


$article = new Article();
$article->setName($_POST['title']);
$article->setContent($_POST['editor']);
$article->setSumup($_POST['sumup_editor']);
$article->setCategory($categoryId);
$article->setAuthor($_SESSION['USR']);
$article->setTags($_POST['tags']);


$ret=$articleController->submitNewArticle($article);
if($ret){
	header("location:../adminConsole.php");
}else{
	echo "Unexpected exception";
}