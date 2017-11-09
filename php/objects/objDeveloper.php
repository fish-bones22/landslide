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
			# code...
		}

		function setValuesByArray($array) {
			
			parent::setValuesByArray($array);
			$this->dev_name = $array["dev_name"];
			$this->dev_description = $array["dev_desc"];
			$this->dev_id = $array["dev_id"];
			$this->total_revenue = $this->getTotalRevenue();
			$this->total_downloads = $this->getTotalDownloads();

		}

		function getTotalDownloads() {
			if ($this->id == null || $this->$id <= 0) return -1;

			$products = Product::getProductsByOwner($this->id);
			$downloads = 0;

			foreach ($products as $prod) {
				$downloads += $prod->downloads;
			}

			return $downloads;
		}


		function getTotalRevenue() {
			if ($this->id == null || $this->$id <= 0) return -1;

			$products = Product::getProductsByOwner($this->id);
			$revenue = 0;

			foreach ($products as $prod) {
				$revenue += ($prod->downloads * $prod->price);
			}

			return $revenue;
		}



		static function getDeveloperById($id) {

			if ($id == null || $id <= 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT * FROM tbl_user JOIN tbl_dev_info ON tbl_user.user_id = tbl_dev_info.user_id WHERE tbl_user.user_id = $id;";

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
			$select_query = "SELECT * FROM tbl_user JOIN tbl_dev_info ON tbl_user.user_id = tbl_dev_info.user_id 
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
	}
 ?>