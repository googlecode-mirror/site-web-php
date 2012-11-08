<?php


include  "data/ArticleDAO.php";
include "data/CommentDAO.php";

class ArticleControls{
	
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
	
	public function addComment($comment){
		$insert=$this->aCommentDAO->addNewComment( $comment);
		if($insert == 1){
			return true;
		}else return false;
	}
	
	public function getFiveLast(){
		return $this->aArticleDAO->getFiveLast();
	}
	
	public function get_ip()
	{
	    if ( isset ( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
	    {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    elseif ( isset ( $_SERVER['HTTP_CLIENT_IP'] ) )
	    {
	        $ip  = $_SERVER['HTTP_CLIENT_IP'];
	    }
	    else
	    {
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}
}
?>