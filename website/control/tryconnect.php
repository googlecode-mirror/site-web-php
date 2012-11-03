<?php

include "../data/Connection.php";

class tryconnect{
	
	private $connection;
	
	function tryConnect(){
		$dbAccess=new testDAO();
		$connection=$dbAccess->connect();
		if($connection!=null){
			return "it's all right";
		}else{
			return "BIG FAIL";
		}
	}
	
}
?>