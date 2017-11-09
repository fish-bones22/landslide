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
		public $timestamp;

		function __construct()
		{
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
			$this->timestamp = $array["tmstmp"];

		}

		static function getUserById($id) {

			if ($id == null || $id <= 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp
				FROM tbl_user WHERE user_id = $id AND status = 1;";

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

		static function getUsers(int $count) {

			if ($count == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp
				FROM tbl_user WHERE status = 1; LIMIT $count;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$dev_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$dev = new Developer();
				$dev->setValuesByArray($row);
				$dev_array[$index] = $dev;
				$index++;
			}
			
			return $dev_array;

		}

		static function getUsersBySearchTerm($search) {

			if ($search == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp
			 	FROM tbl_user 
			 	WHERE fname LIKE '%$search%' OR lname  LIKE '%$search%' OR email LIKE '%$search%' AND status = 1
				ORDER BY fname;";


			if ($search == "ALLUSERS")
				$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp
					FROM tbl_user WHERE status = 1 ORDER BY fname;";


			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$usr_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$usr = new User();
				$usr->setValuesByArray($row);
				$usr_array[$index] = $usr;
				$index++;
			}

			return $usr_array;

		}

		static function deleteUser($id) {

			if ($id == null || $id == 0) return -1;

			$conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_user SET status = 0 WHERE user_id = $id;";

			$result = $conn->query($update_query);

			$conn->close();

			if (!$result) return false;

			return true;
		}

		static function getUsersStartingWith($search) {

			if ($search == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp
			 	FROM tbl_user 
			 	WHERE fname LIKE '$search%' OR lname  LIKE '$search%'  OR email  LIKE '$search%' AND status = 1
				ORDER BY fname;";


			if ($search == "ALLUSERS")
				$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp
					FROM tbl_user WHERE status = 1 ORDER BY fname;";


			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$usr_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$usr = new User();
				$usr->setValuesByArray($row);
				$usr_array[$index] = $usr;
				$index++;
			}

			return $usr_array;

		}

	}

 ?>