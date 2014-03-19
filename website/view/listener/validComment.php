<?php

include_once 'data/CategoryDAO.php';
include_once 'control/ArticleControls.php';
include_once 'business/Article.php';

// session_start();
$articleController= new ArticleControls();
$ret;
$allUncheckedComment= $articleController->getAllUncheckedComments();
if($allUncheckedComment != null){
	$articleId="";
	foreach ($allUncheckedComment as $comment){
		$article;
		$articleId="valid_".$comment->comment_id."";
		if(isset($_POST[$articleId]) ){
			$ret=$articleController->validComments($comment->comment_id);
		}

	}
}

if($ret){
	header("location:../validComments.php");
}else{
	echo "Unexpected exception";
}