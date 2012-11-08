<?php

include_once  "data/Connection.php";
include "business/Article.php";

class ArticleDAO{
	private $con;

	public function __construct(){
		$this->con=(new Connection())->connect();
	}
	
	public function __destruct(){
		$this->con=null;
	}
	
	/*public function create(Article $pArticle){

	}
	public function update();*/
	public function getById($pId){
		try {	
			$resultats=$this->con->query("SELECT * from news where News_id=".$pId); // on va chercher tous les membres de la table qu'on trie par ordre croissant
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$article = $resultats->fetch();
			$resultats->closeCursor();
			return $article;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		
	}
	
	public function getFiveLast(){
		$resultats=$this->con->query("SELECT max(News_id) from news"); // on va chercher tous les membres de la table qu'on trie par ordre croissant
		$resultats->setFetchMode(PDO::FETCH_NUM); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
		$article = $resultats->fetch();
		$min=$article[0]-5;
		if($min < 0){
			$min=0;
		}
		try {
			$resultats=$this->con->query("SELECT * from news where News_id >".$min); // on va chercher tous les membres de la table qu'on trie par ordre croissant
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$inc=0;
				
			while($article = $resultats->fetch()){
				$listArticle[$inc]=$article;
				$inc++;
			}
			$resultats->closeCursor();
			return $listArticle;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function getByCategory($pId){
		try {
			$resultats=$this->con->query("SELECT * from news where Category_id=".$pId); // on va chercher tous les membres de la table qu'on trie par ordre croissant
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$inc=0;
			
			while($article = $resultats->fetch()){
				$listArticle[$inc]=$article;
				$inc++;
			}
			$resultats->closeCursor();
			return $listArticle;
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
	
	
}