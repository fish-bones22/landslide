<?php 
	session_start();

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';

	$user_id = $_SESSION["userid"];
	$email = $_REQUEST["email"];
	$password = $_REQUEST["password"];
	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	$dev_toggle = isset($_REQUEST["dev_toggle"]);
	$dev_name = "";
	$dev_desc = "";

	echo "$dev_toggle";

	

	if ($dev_toggle && isset($_REQUEST["dev_name"]) && isset($_REQUEST["dev_desc"])) {
		$dev_name =  $_REQUEST["dev_name"];
		$dev_desc =  $_REQUEST["dev_desc"];
	}
 ?>