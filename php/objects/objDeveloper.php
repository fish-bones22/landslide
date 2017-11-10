<?php 
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php';
	/**
	* Cl
	*/
	class Developer extends User
	{
		
		public $dev_name;
		public $dev_description;
		public $dev_id;
		public $total_downloads;
		public $total_revenue;

		function __construct()
		{
			parent::__construct();
		}

		function setDevValues($id, $dev_name, $dev_desc) {
			$this->dev_id = $id;
			$this->dev_name = $dev_name;
			$this->dev_description = $dev_desc;
		}


		function setValuesByArray($array) {
			
			parent::setValuesByArray($array);
			$this->dev_name = $array["dev_name"];
			$this->dev_description = $array["dev_desc"];
			$this->dev_id = $array["dev_id"];
			$this->total_revenue = $this->getTotalRevenue();
			$this->total_downloads = $this->getTotalDownloads();

		}

		function registerToDatabase() {
			
			// If user is already defined. Use update instead.
			if ($this->id != null && $this->id != 0) return false;

			$this->conn = connectToDb("db_avalanche_store");

			$add_query = "INSERT INTO tbl_dev_info 
			(user_id, 
			 dev_name,	
			 dev_desc) 
			VALUES 
			('$this->dev_id', 
			 '$this->dev_name',	
			 '$this->dev_description');";

			$result = $this->conn->query($add_query);

			$this->conn->close();

			if (!$result) return false;

			return true;
		}

		function update() {
			
			// If user is not defined. Use register instead.
			if ($this->id == null || $this->id == 0) return false;

			$this->conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_dev_info SET
			 dev_name = '$this->dev_name',
			 dev_desc = '$this->dev_description' WHERE user_id = '$this->id';";

			$result = $this->conn->query($update_query);

			$this->conn->close();

			if (!$result) return false;

			return true;

		}

		function getTotalDownloads() {

			if ($this->id == null || $this->id <= 0) return -1;

			$products = Product::getProductsByOwner($this->id, 1);
			
			if (!$products || count($products) <= 0) return 0;

			$downloads = 0;

			foreach ($products as $prod) {
				$downloads += $prod->downloads;
			}

			return $downloads;
		}


		function getTotalRevenue() {
			if ($this->id == null || $this->id <= 0) return -1;

			$products = Product::getProductsByOwner($this->id, 1);

			if (!$products || count($products) <= 0) return 0;

			$revenue = 0;

			foreach ($products as $prod) {
				$revenue += ($prod->downloads * $prod->price);
			}

			return $revenue;
		}



		static function getDeveloperById($id) {

			if ($id == null || $id <= 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp FROM tbl_user JOIN tbl_dev_info ON tbl_user.user_id = tbl_dev_info.user_id WHERE tbl_user.user_id = $id AND status = 1;";

			$result = $conn->query($select_query);

			$conn->close();

			if (!$result || $result->num_rows <= 0)
				return false;

			$user = new Developer(); 

			while ($row = $result->fetch_assoc()) {

				$user->setValuesByArray($row);

			} 

			return $user;

		}

		static function getDevelopers($count) {

			if ($count == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = 
			$select_query = "SELECT * FROM tbl_user, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp
				JOIN tbl_dev_info ON tbl_user.user_id = tbl_dev_info.user_id  WHERE status = 1
				LIMIT $count;";

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

		static function getTopEarners($count) {

			if ($count == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = 
			$select_query = "SELECT *, DATE_FORMAT(tbl_user.timestamp, '%b %d, %Y') as tmstmp FROM tbl_user 
				JOIN tbl_dev_info ON tbl_user.user_id = tbl_dev_info.user_id WHERE status = 1
				LIMIT $count;";

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
			
			usort($dev_array, array("Developer", "cmp_"));
			return $dev_array;

		}

		static function cmp_($a, $b) {
			if ($a->total_revenue == $b->total_revenue)
				return 0;

			return ($a->total_revenue < $b->total_revenue) ? -1 : 1;
		}
	}
 ?>