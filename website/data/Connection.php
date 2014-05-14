<?php

include_once 'control/ConfigurationManager.php';


class connection{
	private $logger;
	
	
	public function __construct() {
		$this->logger = Logger::getLogger(__CLASS__);
	}
	
	
	public function connect(){
		$conn=null;
		try {
			$conn = new PDO(ConfigurationManager::getInstance()->getDatabaseUrl()
					, ConfigurationManager::getInstance()->getDatabaseUser()
					, ConfigurationManager::getInstance()->getDatabasePassword());
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			$this->logger->error("Cannot connect to database: ". $e->getMessage());
		}
		return $conn;
	}
	
}

	?>