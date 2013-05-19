<?php
include_once  "data/Connection.php";

class CategoryDAO{
	private $con;

	public function __construct(){
		$this->con=(new Connection())->connect();
	}

	public function __destruct(){
		$this->con=null;
	}
	
	/*public function getByName($name){
		try {
			$stmt = $this->con->prepare("Select * from category where category_name= :category_name)");
			$stmt->bindParam(':category_name', $name);
			$return=$stmt->execute();
			return $return;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		
	}*/
	public function getByName($titre){
		try {
			$resultats=$this->con->query("SELECT * from category where category_name ='".$titre."'"); // on va chercher tous les membres de la table 
			$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$article = $resultats->fetch();
			$resultats->closeCursor();
			return $article;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	
	}
}