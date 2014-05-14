<?php

class ConfigurationManager {
	
	private static $_instance = null;
	
	private $databasesProperties = null;
	private $resourcesProperties = null;
	private $loggerProperties = null;
	
	/**
	 * Constructeur de la classe
	 *
	 * @param void
	 * @return void
	 */
	private function __construct() {
		$this->readConfigurationFile();
	}
	
	/**
	 * Méthode qui crée l'unique instance de la classe
	 * si elle n'existe pas encore puis la retourne.
	 *
	 * @param void
	 * @return Singleton
	 */
	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new ConfigurationManager();
		}
		return self::$_instance;
	}
	
	private function readConfigurationFile() {
		$ini_array = parse_ini_file("system.ini", true);
		$this->resourcesProperties = $ini_array['Resources'];
		$this->databasesProperties = $ini_array['Database'];
	}
	
	public function getDatabaseUrl() {
		return $this->databasesProperties['url'];
	}
	
	public function getDatabaseUser() {
		return $this->databasesProperties['user'];
	}
	
	public function getDatabasePassword() {
		return $this->databasesProperties['password'];
	}
	
	public function getBaseUrl() {
		return $this->resourcesProperties['base_url'];
	}
	
	public function getBaseDirectory() {
		return $this->resourcesProperties['base_directory'];
	}
	
	public function getLoggerConfigurationFileLocation() {
		return $this->getBaseDirectory().$this->resourcesProperties['relative_logger_file'];
	}
	
} 

//loading Logger
require_once('log4php/Logger.php');
Logger::configure(ConfigurationManager::getInstance()->getLoggerConfigurationFileLocation());