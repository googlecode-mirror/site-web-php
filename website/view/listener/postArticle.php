<?php

include_once 'data/CategoryDAO.php';
include_once 'control/ArticleControls.php';
include_once 'business/Article.php';



$categoryDao = new CategoryDao();
$articleController = new ArticleControls();
$categoryId = $categoryDao->getIdForName($_POST['category']);


$article = new Article();
$article->setName($_POST['title']);
$article->setContent($_POST['editor']);
$article->setSumup($_POST['sumup_editor']);
$article->setCategory($categoryId);
$article->setAuthor($_SESSION['USR']);
$article->setTags($_SESSION['tag']);


$ret=$articleController->submitNewArticle($article);
if($ret){
	header("location:../adminConsole.php");
}else{
	echo "Unexpected exception";
}