<?php

include_once 'data/CategoryDAO.php';
include_once 'control/ArticleControls.php';
include_once 'business/Article.php';



$categoryDao = new CategoryDao();
$articleController = new ArticleControls();

$article = new Article();
$article->setName($_POST['title']);
$article->setId(intval($_POST['id']));
$article->setContent($_POST['editor']);
$article->setSumup($_POST['sumup_editor']);
$article->setTags($_POST['tags']);

$name = 'delete';
if (isset($_POST[$name])){
	echo "???zae";
	$ret=$articleController->deleteArticle(intval($_POST['id']));
}else{
	$ret=$articleController->alterArticle($article);
}
if($ret){
	header("location:../adminConsole.php");
}else{
	echo "Unexpected exception";
}