<?php 
	session_start();

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objDeveloper.php';

	$email = "";
	$devname = "";
	$devdesc = "";

	if (isset($_REQUEST['email']))
		$email = $_REQUEST['email'];
	if (isset($_REQUEST['devName']))
		$devname = $_REQUEST['devName'];
	if (isset($_REQUEST['devDesc']))
		$devdesc = $_REQUEST['devDesc'];

	$user = User::getUserByEmail($email);
	$id = $user->id;
	echo "$user->id";
	echo $id;
	echo $email;
	echo "asdf";

	$dev = new Developer();

	$dev->setDevValues($id, $devname, $devdesc);
	
	$result = $dev->registerToDatabase();

	if (!result)
		header("Location: /landslide/register-dev.php?err");

	$_SESSION["userid"] = $id;
	$_SESSION["isdev"] = 1;
	header("Location: /landslide/index.php");

?>
