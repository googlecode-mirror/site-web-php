<?php


include "../data/ArticleDAO.php";

class tryconnect{
	
	private $aArticleDAO;
	private $aArticle;
	private $aListArticle;
	
	public function getArticle(){
		return $this->aArticle;
	}
	
	public function print_Article($var){
		$this->aArticleDAO=new ArticleDAO();
		
		//$this->aArticle=$this->aArticleDAO->getById(2);
		
		return $this->aArticleDAO->getByCategory($var);
	}
	
	public function getArticleById($id) {
		$this->aArticleDAO=new ArticleDAO();
		return $this->aArticleDAO->getById($id);
	}
	
}
?>