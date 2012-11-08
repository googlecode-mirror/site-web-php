<?php


include'control/ArticleControls.php';
include_once 'business/Comment.php';

$comment= new Comment();
$control= new ArticleControls();
$comment->setTitle($_POST['title']);
$comment->setContent($_POST['content']);
$comment->setUser_name($_POST['name']);
$comment->setNews_id($_POST['id']);
$comment->setIp($_POST['ip']);


if($control->addComment($comment)){
	header("location:../news.php?art_id=".$_POST['id']);
}else{
	echo "La requête n'a pu être exécutée";
}
