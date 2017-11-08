<?php 

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php';

	$prod_id = $_REQUEST["prodid"];
	$mode = $_REQUEST["mode"];

	$result = false;

	if ($mode == 1)
    	$result = Product::approveProduct($prod_id);
    else if ($mode == 2)
    	$result = Product::denyProduct($prod_id);

	if (!$result) { 
		echo -1;
	} else {
		echo 1;
	}

 ?>