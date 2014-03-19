<?php

include_once  "data/Connection.php";
include "business/Comment.php";

class CommentDAO {
	private $con;
	
	public function __construct(){
		$this->con=(new Connection())->connect();
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
			print "Error!: " . $e->getMessage() . "<br/>";
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
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	
	}
	
	public function delete($pId){
		try {
			$resultats=$this->con->exec("Delete from news where News_id=".$pId);
			return $resultats;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function validComments($pId){
		try {
			$resultats=$this->con->exec("UPDATE comment SET comment_isValid = '1' WHERE comment_id =".$pId);
			return $resultats;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
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
			$stmt->bindParam(':comment_user_name', $userName);
			$stmt->bindParam(':comment_title', $title);
			$stmt->bindParam(':comment_content', $content);
			$stmt->bindParam(':news_id', $newsId);
			$stmt->bindParam(':comment_ip', $ip);
			$return=$stmt->execute();
			return $return;
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
	}
	
}