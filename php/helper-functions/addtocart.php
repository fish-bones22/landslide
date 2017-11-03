<?php 

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objCart.php';

	$rating = $_REQUEST["rating"];
	$user_id = $_REQUEST["userid"];
	$prod_id = $_REQUEST["prodid"];

	$price = Product::getPriceOfProduct($prod_id);

	$result = Cart::saveCartItem($user_id, $prod_id, $price, $rating);

	echo $result;

 ?>