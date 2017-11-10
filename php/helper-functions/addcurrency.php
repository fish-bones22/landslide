<?php 
	session_start();
	
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';

	$userid = $_SESSION["userid"];
	$currency = $_REQUEST["currency"];

	$user = User::getUserById($userid);
	$result = $user->updateCurrencyAmount($user->currency_amount + $currency);

	if (!$result)
		header("Location: /landslide/accountsettings.php?err");


	header("Location: /landslide/accountsettings.php");

 ?>