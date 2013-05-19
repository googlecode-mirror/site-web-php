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
	
	public function  dateReducted($pDate){
		preg_match('/(?P<date>[^.]+) (?P<hour>[^.]+)/', $pDate, $regs);
		$date=$regs['date'];
		preg_match('/(?P<year>[^.]+)-(?P<month>[^.]+)-(?P<day>[^.]+)/',//y a pas idée de se faire du mal comme ca
		$date , $regs);
		
		$retour=$regs['day']." ";
		switch ($regs['month']){
			case 1:
				$retour=$retour."Jan";
				break;
			case 2:
				$retour=$retour."Fev";
				break;
			case 3:
				$retour=$retour."Mar";
				break;
			case 4:
				$retour=$retour."Avr";
				break;
			case 5:
				$retour=$retour."Mai";
				break;
			case 6:
				$retour=$retour."Jun";
				break;
			case 7:
				$retour=$retour."Jul";
				break;
			case 8:
				$retour=$retour."Aou";
				break;
			case 9:
				$retour=$retour."Sep";
				break;
			case 10:
				$retour=$retour."Oct";
				break;
			case 11:
				$retour=$retour."Nov";
				break;
			case 12:
				$retour=$retour."Dec";
				break;
		}
		return $retour;
	}
}
?>