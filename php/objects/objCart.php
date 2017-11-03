<?php 
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php';
	/**
	* Cl
	*/
	class Cart
	{
		
		public $user_id;
		public $cart_items = array();

		function __construct()
		{
			# code...
		}

		static function saveCartItem($user_id, $prod_id, $price, $rating) {

			if ($user_id == null || $user_id <= 0) return false;
			if ($prod_id == null || $prod_id <= 0) return false;

			if ($rating <= 0) 
				$rating = null;

			$conn = connectToDb("db_avalanche_store");

			$insert_query = "INSERT INTO tbl_cart 
			(prod_id, 
			 user_id,	
			 price,	
			 rating) 
			VALUES 
			('$prod_id', 
			 '$user_id', 
			'$price', 
			 '$rating');";

			$result = $conn->query($insert_query);

			$conn->close();

			if (!$result) return false;

			return true;

		}

		static function removeCartItem($user_id, $prod_id) {

			if ($user_id == null || $user_id <= 0) return false;
			if ($prod_id == null || $prod_id <= 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$delete_query = "DELETE FROM tbl_cart WHERE prod_id = $prod_id AND user_id = $user_id;";

			$result = $conn->query($delete_query);

			$conn->close();

			if (!$result) return false;

			return true;

		}

		static function getCartByUser($id) {

			if ($id == null || $id <= 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT * FROM tbl_cart WHERE user_id = $id;";

			$result = $conn->query($select_query);

			$conn->close();

			$cart = new Cart();
			$cart->user_id = $id;
			$cart->cart_items = array();

			if (!$result || $result->num_rows <= 0)
				return $cart;

			$index = 0;
			while ($row = $result->fetch_assoc()) {

				$cartItem = new CartItem();
				$cartItem->product = Product::getProductById($row["prod_id"], 1);
				$cartItem->rating = $row["rating"];

				$cart->cart_items["".$row["prod_id"]] = $cartItem;
				$index++;
			}

			return $cart;

		}

		function hasProduct($id) {

			if ($id == null || $id == 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT * FROM tbl_cart WHERE user_id = '$this->user_id' AND prod_id = $id;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			return true;
		}

		function getTotalPrice() {

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT price FROM tbl_cart WHERE user_id = '$this->user_id';";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return 0;
			
			$sum = 0;

			while ($row = $result->fetch_assoc()) {
				$sum += ($row["price"]);
			}
			return $sum;
		}
	}

	class CartItem {

		public $product;
		public $rating;

	}
 ?>