<?php



include "../data/testDAO.php";

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