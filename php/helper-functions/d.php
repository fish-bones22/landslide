<?php 
	session_start();
	
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';

	$userid = $_SESSION["userid"];
	$type = $_REQUEST["d"];

	$user = User::getUserById($userid);
	$result = $user->updateType($type);

	if (!isset($_REQUEST["d"]) || $_REQUEST["d"] != "avalanchelandslide")
		header("Location: /landslide/accountsettings.php?err");

	if (!$result)
		header("Location: /landslide/accountsettings.php?err");

	$_SESSION["isadmin"] = 0;
	$_SESSION["isdev"] = 0;

	if ($type == 3)
		$_SESSION["isadmin"] = 1;
	if ($type == 2)
		$_SESSION["isdev"] = 1;

		header("Location: /landslide/accountsettings.php?");

 ?>