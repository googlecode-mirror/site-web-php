<?php


class connection{
	
	function connect(){
		$conn=null;
		try {
			$conn = new PDO('mysql:host=localhost;dbname=siteperso', 'malika', 'stprs01');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
		return $conn;
	}
	
}

	?>