<?php

include  "data/ArticleDAO.php";


class LeftPanelControls{
	
	private $aArticleDAO;
	private $aListArticle;
	
	public function __construct(){
		$this->aArticleDAO=new ArticleDAO();
	}
	
	
}