<?php 
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objCart.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objTransaction.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php';
    
	$cart = Cart::getCartByUser($_SESSION["userid"]);
	$user = User::getUserById($_SESSION["userid"]);
	$trans_id = Transaction::generateTransactionId();

	if ($cart->getTotalPrice() > $user->currency_amount) {
		header("Location: /landslide/checkout.php?insuff");
		exit;
	}

	$file_array = array();

	while ($item = each($cart->cart_items)) {

		$prod_id =  $item[1]->product->id;
		$prod_name = $item[1]->product->name;
		$price = $item[1]->product->price;

		Transaction::saveTransaction($_SESSION["userid"], $prod_id, $prod_name, $price, $trans_id, $item[1]->rating);

		Cart::removeCartItem($_SESSION["userid"], $prod_id);

		$user->updateCurrencyAmount($user->currency_amount - $price);

		array_push($file_array,$_SERVER["DOCUMENT_ROOT"].$item[1]->product->file_location);

	}

	$_SESSION["files"] = $file_array;


	header("Location: /landslide/checkout-landing.php?trans=".$trans_id);
	exit;

 ?>