<?php


include "../data/ArticleDAO.php";

class tryconnect{
	
	private $aArticleDAO;
	private $aArticle;
	
	public function getArticle(){
		return $this->aArticle;
	}
	
	public function print_Article(){
		$this->aArticleDAO=new ArticleDAO();
		
		$this->aArticle=$this->aArticleDAO->getById(2);
	
	}
	
}
?>