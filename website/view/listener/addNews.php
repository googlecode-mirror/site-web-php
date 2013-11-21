<?php

include_once 'business/Article.php';
include'control/ArticleControls.php';
include_once 'business/Comment.php';

$article= new Article();
$control= new ArticleControls();
$article->setTitle($_POST['title']);
$article->setContent($_POST['category']);
// $article->setUser_name($_POST['name']);
// $article->setNews_id($_POST['id']);
// $article->setIp($_POST['ip']);

if($control->addMail($article)){
	header("location:../news.php?art_id=".$_POST['id']);
}else{
	echo "La requête n'a pu être exécutée";
}