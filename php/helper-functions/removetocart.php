<?php 

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objCart.php';

	$user_id = $_REQUEST["userid"];
	$prod_id = $_REQUEST["prodid"];

	$result = Cart::removeCartItem($user_id, $prod_id);
    $cart = Cart::getCartByUser($user_id);

	if (!$result) { 
		echo -1;
	} else {
		echo $cart->getTotalPrice();
	}

 ?>