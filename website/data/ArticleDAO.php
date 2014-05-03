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
	
	public function getFiveMostReaded(){
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
	
	public function getFiveLast(){
		$resultats=$this->con->query("SELECT max(News_id) from news"); // on va chercher tous les membres de la table qu'on trie par ordre croissant
		$resultats->setFetchMode(PDO::FETCH_NUM); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
		$article = $resultats->fetch();
		$min=$article[0]-5;
		if($min < 0){
			$min=0;
		}
		try {
			$resultats=$this->con->query("SELECT * from news where News_id >".$min." order by News_date"); // on va chercher tous les membres de la table qu'on trie par ordre croissant
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$inc=0;
			$listArticle = null;
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
	
	public function getFavorites(){
		$resultats=$this->con->query("SELECT * from favorites"); // on va chercher tous les membres de la table qu'on trie par ordre croissant
		$resultats->setFetchMode(PDO::FETCH_ASSOC); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
		$inc=0;
		try {
				
			while($favorites = $resultats->fetch()){
				$listArticle[$inc]=$favorites;
				$inc++;
			}
			$resultats->closeCursor();
			return @ $listArticle;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function getBySearch($htmlSearch){
		try{
			$stmt = $this->con->prepare("Select * from news where news_title like :crit");
			$titleSearch = "%".$htmlSearch."%";
			$stmt->bindParam(':crit', $titleSearch);
			$stmt->setFetchMode(PDO::FETCH_OBJ);
			$stmt->execute();
			$inc=0;
			
			while($article = $stmt->fetch()){
				$listArticle[$inc]=$article;
				$inc++;
			}
			$stmt->closeCursor();
			return @ $listArticle;
				
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
			return @ $listArticle;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	
	}

	public function update($article){
		// UPDATE `siteperso`.`category` SET `category_name` = 'Detente' WHERE `category`.`category_id` =6;
		try {
			$categoryDao = new CategoryDao();
				
			$stmt = $this->con->prepare("UPDATE siteperso.news".
					" set News_content =  :new_content ,".
					" News_tag = :new_tags ,".
					" News_title = :new_title ,".
					" News_sumup = :new_sumup".
					" where News_id = :new_id ");
				
			//" ('News_id', 'News_date', 'News_content', 'News_author', 'Category_id', 'News_tag', 'News_title', 'News_sumup')".
			// 			$author = $article->getAuthor();
			$title = $article->getName();
			$content = $article->getContent();
			$id = $article->getId();
			$tags=$article->getTags();
			$sumup= $article->getSumup();
			
			$stmt->bindParam(':new_content', $content);
			$stmt->bindParam(':new_id', $id);
			$stmt->bindParam(':new_tags', $tags);
			$stmt->bindParam(':new_title',$title);
			$stmt->bindParam(':new_sumup', $sumup);
			
			var_dump($stmt);
				
			$return=$stmt->execute();
			return $return;
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
	

	public function addNewArticle($article){
		//INSERT INTO `news`(`News_id`, `News_date`, `News_content`, `News_author`, `Category_id`, `News_tag`, `News_title`)		try {
		try {	
			$categoryDao = new CategoryDao();
			
			$stmt = $this->con->prepare("INSERT INTO siteperso.news".
					" VALUES ( default, default, :news_content, :new_author, :news_category, :new_tags, :news_title, :new_sumup)");
			
			//" ('News_id', 'News_date', 'News_content', 'News_author', 'Category_id', 'News_tag', 'News_title', 'News_sumup')".
// 			$author = $article->getAuthor();
			$author = 'malika';
			$title = $article->getName();
			$content = $article->getContent();
			$categoryId = $article->getCategory();
			$tags=$article->getTags();
			$sumup= $article->getSumup();;
			
			$stmt->bindParam(':news_content', $content);
			$stmt->bindParam(':new_author', $author);
			$stmt->bindParam(':news_category', $categoryId);
			$stmt->bindParam(':new_tags', $tags);
			$stmt->bindParam(':news_title',$title);
			$stmt->bindParam(':new_sumup', $sumup);
			
 			$return=$stmt->execute();
			return $return;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}