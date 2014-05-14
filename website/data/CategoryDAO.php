<?php
include_once  "data/Connection.php";
require_once('log4php/Logger.php');


class CategoryDAO{
	private $con;
	private $logger;

	public function __construct(){
		$this->con=(new Connection())->connect();
		$this->logger = Logger::getLogger(__CLASS__);
	}

	public function __destruct(){
		$this->con=null;
	}
	
	public function getByName($titre){
		try {
			$resultats=$this->con->query("SELECT * from category where category_name ='".$titre."'"); // on va chercher tous les membres de la table 
			//$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$resultats->setFetchMode(PDO::FETCH_ASSOC);
			$category= $resultats->fetch();
			$resultats->closeCursor();
			return $category;
		} catch (PDOException $e) {
			$this->logger->severe("Exception executing request - getByName(".$titre.") -".$e->getMessage());
			die();
		}
	}
	
	public function getIdForName($titre){
		try {
			$query = "SELECT category_id from category where category_name ='".$titre."'";
			$resultats=$this->con->query($query); // on va chercher tous les membres de la table
			//$resultats->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			$resultats->setFetchMode(PDO::FETCH_UNIQUE);
			$category= $resultats->fetch();
			$resultats->closeCursor();
			$categoryId = $category['category_id'];
			return $categoryId;
		} catch (PDOException $e) {
			$this->logger->severe("Exception executing request - getIdForName(".$titre.") -".$e->getMessage());
			die();
		}
	}
	
	
	public function getAllFetchArray(){
		try{
			$resultats=$this->con->query("SELECT * from category where category_id > 1 "); // on va chercher tous les membres de la table
			//$resultats->setFetchMode(PDO::FETCH_ASSOC); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
			//$allCat = $resultats->fetch();
			$resultats->setFetchMode(PDO::FETCH_ASSOC); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
	
			$inc=0;
			
			while($cat = $resultats->fetch()){
				$allCat[$inc]=$cat;
				$inc++;
			}
			$resultats->closeCursor();
			return $allCat;
			//$resultats->closeCursor();
			//return $allCat;
			} catch (PDOException $e) {
				$this->logger->severe("Exception executing request - getAllFetchArray -".$e->getMessage());
				die();
			}
		
	}
}