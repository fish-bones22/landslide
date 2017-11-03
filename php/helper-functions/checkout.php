<?php 

	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objCart.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objTransaction.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';
    
    session_start();

	$cart = Cart::getCartByUser($_SESSION["userid"]);
	$user = User::getUserById($_SESSION["userid"]);
	$trans_id = Transaction::generateTransactionId();

	if ($cart->getTotalPrice() > $user->currency_amount) {
		header("Location: /landslide/checkout.php?insuff");
		exit;
	}

	while ($item = each($cart->cart_items)) {

		$prod_id =  $item[1]->product->id;
		$price = $item[1]->product->price;

		Transaction::saveTransaction($_SESSION["userid"], $prod_id, $price, $trans_id, $item[1]->rating);

		Cart::removeCartItem($_SESSION["userid"], $prod_id);

		$user->updateCurrencyAmount($user->currency_amount - $price);

	}

	header("Location: /landslide/checkout-landing.php");

 ?>