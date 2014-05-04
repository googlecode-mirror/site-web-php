<?php

include_once 'control/ArticleControls.php';

$articleController = new ArticleControls();

$ret=$articleController->deleteArticle(intval($_POST['id']));

if($ret){
	header("location:../adminConsole.php");
}else{
	echo "Unexpected exception";
}