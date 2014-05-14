<?php

include_once  "data/Connection.php";
include "business/Comment.php";
include_once 'control/ConfigurationManager.php';
require_once('log4php/Logger.php');


class CommentDAO {
	private $con;
	private $logger;
	
	public function __construct(){
		$this->con=(new Connection())->connect();
		$this->logger = Logger::getLogger(__CLASS__);
	}
	
	public function __destruct(){
		$this->con=null;
	}
	
	public function getAllUnvalid(){
		try {
			$resultats=$this->con->query("SELECT * from comment where comment_isValid=0 order by news_id"); // on va chercher tous les membres de la table qu'on trie par ordre croissant
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$inc=0;
				
			$existResult=false;
			while($article = $resultats->fetch()){
				$existResult=true;
				$listComment[$inc]=$article;
				$inc++;
	
			}
			$resultats->closeCursor();
			if($existResult){
				return @$listComment;
			}else return false;
				
		} catch (PDOException $e) {
			$this->logger->severe("Exception executing request - getAllUnvalid -".$e->getMessage());
			die();
		}
	
	}
	
	public function removeAllUnvalid(){
		try {
			$resultats=$this->con->exec("delete from comment where comment_isValid=0 "); // on va chercher tous les membres de la table qu'on trie par ordre croissant
		} catch (PDOException $e) {
			$this->logger->severe("Exception executing request - removeAllUnvalid -".$e->getMessage());
			die();
		}
	
	}
	
	
	
	public function getByNews($pId){
		try {
			$resultats=$this->con->query("SELECT * from comment where News_id=".$pId); // on va chercher tous les membres de la table qu'on trie par ordre croissant
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$inc=0;
			
			$existResult=false;
			while($article = $resultats->fetch()){
				$existResult=true;
				$listComment[$inc]=$article;
				$inc++;
				
			}
			$resultats->closeCursor();
			if($existResult){
				return @$listComment;
			}else return false;
			
		} catch (PDOException $e) {
			$this->logger->severe("Exception executing request - getByNews(".$pId.") -".$e->getMessage());
			die();
		}
	
	}
	
	public function delete($pId){
		try {
			$resultats=$this->con->exec("Delete from news where News_id=".$pId);
			return $resultats;
		} catch (PDOException $e) {
			$this->logger->severe("Exception executing request - delete(".$pId.") -".$e->getMessage());
			die();
		}
	}
	
	public function validComments($pId){
		try {
			$resultats=$this->con->exec("UPDATE comment SET comment_isValid = '1' WHERE comment_id =".$pId);
			return $resultats;
		} catch (PDOException $e) {
			$this->logger->severe("Exception executing request - validComments(".$pId.") -".$e->getMessage());
			die();
		}
	}
	
	public function addNewComment($comment){
		//INSERT INTO `siteperso`.`comment` (`comment_id`, `comment_user_name`, `comment_title`, `comment_content`, `news_id`) VALUES (NULL, 'toto', NULL, 'zeazeazea', '4');
		try {
			$stmt = $this->con->prepare("INSERT INTO siteperso.comment".
					" (comment_id, comment_user_name, comment_title, comment_content, news_id , comment_ip)".
					" VALUES ( default, :comment_user_name, :comment_title, :comment_content, :news_id, :comment_ip)");
			$userName = $comment->getUser_name();
			$title = $comment->getTitle();
			$content = $comment->getContent();
			$newsId = $comment->getNews_id();
			$ip=$comment->getIp();
			$stmt->bindParam(':comment_user_name', htmlentities($userName));
			$stmt->bindParam(':comment_title', htmlentities($title));
			$stmt->bindParam(':comment_content', htmlentities($content));
			$stmt->bindParam(':news_id', htmlentities($newsId));
			$stmt->bindParam(':comment_ip', htmlentities($ip));
			$return=$stmt->execute();
			return $return;
			} catch (PDOException $e) {
				$this->logger->severe("Exception executing request - addNewComment -".$e->getMessage());
				die();
			}
	}
	
}