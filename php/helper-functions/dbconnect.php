<?php 
	error_reporting(E_ERROR | E_PARSE);

	function connectToDb($database_name)
	{
		try {
			
			$conn = new mysqli("localhost", "root", "", $database_name);
			if ($conn->connect_error) {
				//die("Connection failed: " . $conn->connect_errno);
				header("Location: /landslide/redirect.php");
				return;
			}
			return $conn;
			
		} catch (Exception $e) {
			header("Location: /landslide/redirect.php");
		} 
	}

 ?>