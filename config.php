<?php

	function safe_log($message, $filepath = "logs/db_error.log"){
		$dir = dirname($filepath);
		if(!file_exists($dir)){
			mkdir($dir, 0777, true);
		}
		file_put_contents($filepath, $message, FILE_APPEND);
	}


	$host = "localhost";
	$userName = "root";
	$dbName = "gallery";
	$password = "";


	try {
		$conn = new PDO("mysql:host=$host;dbname=$dbName",$userName,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		// echo "Succefully";
	}
	catch(PDOException $e){
		safe_log($e->getMessage()."\n");
		die("Error In the db");
	}
?>