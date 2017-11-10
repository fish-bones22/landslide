<?php 
	session_start();

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objDeveloper.php';

	$email = "";
	$password = "";
	$fname = "";
	$lname = "";
	$gender = "";
	$type = "";


	if (isset($_REQUEST['email']))
		$email = $_REQUEST['email'];
	if (isset($_REQUEST['password']))
		$password = $_REQUEST['password'];
	if (isset($_REQUEST['fname']))
		$fname = $_REQUEST['fname'];
	if (isset($_REQUEST['lname']))
		$lname = $_REQUEST['lname'];
	if (isset($_REQUEST['gender']))
		$gender = $_REQUEST['gender'];
	if (isset($_REQUEST['type']))
		$type = $_REQUEST['type'];

	$user = new User();

	$user->setValues($email, $password, $type, $fname, $lname, $gender);

	$user->registerToDatabase();

	echo "$email";
	echo "$user->id";

	if ($type == 2) {
		header("Location: /landslide/register-dev.php?email=".$email);
	}
	else {
		$_SESSION["userid"] = $user->id;
		$_SESSION["user"] = $user->name;
		$_SESSION["isdev"] = 0;
		header("Location: /landslide/");
	}
?>


