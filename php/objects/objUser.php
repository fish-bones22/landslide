<?php 
	
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	/**
	* 
	*/
	class User
	{
		
		public $id;
		public $name;
		public $fname;
		public $lname;
		public $sex;
		public $email;
		public $type;
		public $currency_amount;

		function __construct()
		{
			# code...
		}

		function setValuesByArray($array) {

			$this->id = $array["user_id"];
			$this->fname = $array["fname"];
			$this->lname = $array["lname"];
			$this->name = $array["fname"]." ".$array["lname"];
			$this->sex = $array["sex"];
			$this->email = $array["email"];
			$this->type = $array["type"];
			$this->currency_amount = $array["currency_amount"];

		}

		static function getUserById($id) {

			if ($id == null || $id <= 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT * FROM tbl_user WHERE user_id = $id;";

			$result = $conn->query($select_query);

			$conn->close();

			if (!$result || $result->num_rows <= 0)
				return false;

			$user = new User(); 

			while ($row = $result->fetch_assoc()) {

				$user->setValuesByArray($row);

			} 

			return $user;

		}

		function updateCurrencyAmount($amount) {

			if ($amount == null || $amount < 0) return false;
			
			$conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_user SET currency_amount = '$amount' WHERE user_id = $this->id;";

			$result = $conn->query($update_query);

			$conn->close();

			if (!$result)
				return false;

			return true;

		}

	}

 ?>