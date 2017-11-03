<?php 
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	/**
	* Cl
	*/
	class Transaction
	{

		function __construct()
		{
			# code...
		}

		static function generateTransactionId() {

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT trans_id FROM tbl_transaction ORDER BY trans_id DESC LIMIT 1;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return 1;

			return $result->fetch_assoc()["trans_id"] + 1;

		}

		static function saveTransaction($user_id, $prod_id, $price, $trans_id, $rating) {

			if ($user_id == null || $user_id <= 0) return false;
			if ($prod_id == null || $prod_id <= 0) return false;


			$conn = connectToDb("db_avalanche_store");

			$insert_query = "INSERT INTO tbl_transaction 
			(prod_id, 
			 user_id,	
			 price,	
			 trans_id) 
			VALUES 
			('$prod_id', 
			 '$user_id', 
			'$price', 
			 '$trans_id');";

			$result = $conn->query($insert_query);

			$insert_query = "INSERT INTO tbl_prod_stat 
			(prod_id, 
			 user_id,	
			 rating) 
			VALUES 
			('$prod_id', 
			 '$user_id', 
			'$rating' );";

			// Check if user already has a rating
			$select_query = "SELECT * FROM tbl_prod_stat WHERE prod_id = $prod_id AND user_id = $user_id;";
			$result = $conn->query($select_query);
			if ($result->num_rows > 0) {
				$insert_query = "UPDATE tbl_prod_stat SET rating = $rating
				WHERE prod_id = '$prod_id' AND user_id = '$user_id';";
			}

			$result = $conn->query($insert_query);


			$conn->close();

			if (!$result) return false;

			return true;

		}

	}
 ?>
