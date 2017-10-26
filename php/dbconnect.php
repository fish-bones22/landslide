<?php 

	function connectToDb($database_name)
	{
		$conn = new mysqli("localhost", "root", "", $database_name);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}

 ?>