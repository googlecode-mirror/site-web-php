<?php


include "../data/ArticleDAO.php";
include "../data/CommentDAO.php";

class tryconnect{
	
	private $aArticleDAO;
	private $aCommentDAO;
	private $aArticle;
	private $aListArticle;
	private $aListComment;
	
	public function __construct(){
		$this->aArticleDAO=new ArticleDAO();
		$this->aCommentDAO=new CommentDAO();
	}
	
	public function getArticle(){
		return $this->aArticle;
	}
	
	public function print_Article($var){
		return $this->aArticleDAO->getByCategory($var);
	}
	
	public function getArticleById($id) {
		return $this->aArticleDAO->getById($id);
	}
	
	public function getListComment($new){
		return $this->aCommentDAO->getByNews($new);
	}
}
?>