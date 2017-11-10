<?php 

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';

	$usr_id = $_REQUEST["usrid"];

	$result = User::deleteUser($usr_id);

	if (!$result) { 
		echo -1;
	} else {
		echo 1;
	}

 ?>