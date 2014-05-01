<?php

include_once 'control/ConfigurationManager.php';

class connection{
	
	function connect(){
		$conn=null;
		try {
			$conn = new PDO(ConfigurationManager::getInstance()->getDatabaseUrl()
					, ConfigurationManager::getInstance()->getDatabaseUser()
					, ConfigurationManager::getInstance()->getDatabasePassword());
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		return $conn;
	}
	
}

	?>