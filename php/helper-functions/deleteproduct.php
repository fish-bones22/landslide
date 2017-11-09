<?php 

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php';

	$prod_id = $_REQUEST["id"];

	$result = Product::deleteProduct($prod_id);

	if (!$result) { 
		header("Location: /landslide/dev-dashboard.php?err");
	}

	header("Location: /landslide/dev-dashboard.php");

 ?>