<?php 
	session_start();

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objDeveloper.php';

	if (!isset($_REQUEST["verify-password"])) 
		header("Location: /landslide/accountsettings.php");

	$user_id = $_SESSION["userid"];
	$email = $_REQUEST["email"];
	$password = null;
	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	$sex = $_REQUEST["sex"];
	$dev_toggle = isset($_REQUEST["dev_toggle"]);
	$verifypassword = $_REQUEST["verify-password"];
	$type = $dev_toggle ? 2 : 1;
	$dev_name = "";
	$dev_desc = "";

	$user = User::getUserById($user_id);

	$result = $user->userLogIn($user->email, $verifypassword);
	if (!$result) {
		header("Location: /landslide/accountsettings.php?err");
		exit;
	}

	// Get previous type
	$prev_type = $user->type;

	// change password
	if (isset($_REQUEST["password"]) && $_REQUEST["password"] != "" 
		&& isset($_REQUEST["newpassword"]) && $_REQUEST["newpassword"] != "") {
		$password = $_REQUEST["password"];
		$newpassword = $_REQUEST["newpassword"];
		$result = $user->userLogIn($user->email, $password);
		if (!$result) {
			header("Location: /landslide/accountsettings.php?err");
			exit;
		}
		$result = $user->changePassword($newpassword);
		if (!$result) {
			header("Location: /landslide/accountsettings.php?err");
			exit;
		}
	}

	$user->setValues($email, $password, $type, $fname, $lname, $sex);
	$result = $user->update();

	if ($dev_toggle && isset($_REQUEST["dev_name"]) && isset($_REQUEST["dev_desc"])) {
		$dev_name =  $_REQUEST["dev_name"];
		$dev_desc =  $_REQUEST["dev_desc"];

		if ($prev_type == 1) {
			$dev = new Developer();
			$dev->setDevValues($user_id, $dev_name, $dev_desc);
			$result = $dev->registerToDatabase();
			echo "New";
		} else {
			$dev = Developer::getDeveloperById($user_id);
			$dev->setDevValues($user_id, $dev_name, $dev_desc);
			$result = $dev->update();
			echo "Old";
		}
	}

	if (!$result)
		header("Location: /landslide/accountsettings.php?err");


	header("Location: /landslide/accountsettings.php?suc");
 ?>