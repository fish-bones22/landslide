<?php
	session_start();

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';

	$cred_email = "";
	$cred_password = "";

	if (isset($_REQUEST['user_email']))
		$cred_email = $_REQUEST['user_email'];
	if (isset($_REQUEST['user_password']))
		$cred_password = $_REQUEST['user_password'];

	$user = User::userLogIn($cred_email,$cred_password);

	$res1 = $user->email == $cred_email;
	$res2 = $user->password == $cred_password;

	if (isset($res1, $res2)) {
		$_SESSION['user'] = $user->name;
		$_SESSION['userid'] =  $user->id;
		$_SESSION['isdev'] = 0;
		if ($user->type == 2) {
			$_SESSION['isdev'] = 1;
		}
		header("Location: /landslide/index.php");
	} else {
		echo "NO";
		$_SESSION['error'] = 1;
		header("Location: /landslide/login.php?err=1");
	}

 ?>