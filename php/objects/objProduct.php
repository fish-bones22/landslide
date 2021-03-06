<?php 
	
	/**
	* Product Object
	*/
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';

	class Product
	{
		private $conn;

		public $id;
		public $name;
		public $shortname;
		public $midname;
		public $description;
		public $owner;
		public $owner_name;
		public $downloads;
		public $file_location;
		public $icon_location;
		public $file_size;
		public $price;
		public $approval;
		public $timestamp;

		function __construct()
		{
		}

		function setValues($name, $description,	$owner,	$icon_location,	$file_location,	$file_size,	$price) 
		{			
			$this->name = $name;
		 	$this->description = $description;
		 	$this->owner = $owner;
		 	$this->file_location = $file_location;
		 	$this->icon_location = $icon_location;
		 	$this->file_size = $file_size;
		 	$this->price = $price;
		}

		function setValuesByArray($prod_array) 
		{			
			$this->id = $prod_array["prod_id"];
			$this->name = stripslashes($prod_array["name"]);
			$this->shortname = ((strlen($this->name) > 12) ? substr($this->name, 0, 10)."..." : $this->name);
			$this->midname = ((strlen($this->name) > 18) ? substr($this->name, 0, 16)."..." : $this->name);
		 	$this->description = stripslashes($prod_array["description"]);
		 	$this->owner = $prod_array["owner"];
		 	$this->owner_name = $prod_array["dev_name"];
		 	$this->downloads = $prod_array["downloads"];
		 	$this->file_location = $prod_array["file_location"];
		 	$this->icon_location = $prod_array["icon_location"];
		 	$this->file_size = $prod_array["file_size"];
		 	$this->downloads = $prod_array["downloads"];
		 	$this->price = $prod_array["price"];
		 	$this->approval = $prod_array["approval"];
		 	$this->timestamp = $prod_array["tmstmp"];
		}

		function addToDatabase()
		{
			// If product is already defined. Use update instead.
			if ($this->id != null && $this->id != 0) return false;

			// Validations
			if ($this->name == null || $this->name == "")	return false;
			if ($this->description == null || $this->description == "")	return false;
			if ($this->owner == null || $this->owner == 0)	return false;
			if ($this->file_location== null || $this->file_location == "") 	return false;
			if ($this->icon_location == null || $this->icon_location == "") return false;
			if ($this->price == null || $this->price == 0)	return false;

			$this->conn = connectToDb("db_avalanche_store");

			$add_query = "INSERT INTO tbl_product 
			(name, 
			 description,	
			 owner,	
			 icon_location,
			 file_location,	
			 file_size,	
			 price) 
			VALUES 
			('$this->name', 
			 '$this->description',	
			 '$this->owner',	
			 '$this->icon_location',	
			 '$this->file_location',	
			 '$this->file_size',	
			 '$this->price');";

			$result = $this->conn->query($add_query);

			$this->conn->close();

			if (!$result) return false;

			return true;

		}

		function updateProduct()
		{
			// If product is not yet defined. Use add instead.
			if ($this->id == null || $this->id == 0) return false;

			// Validations
			if ($this->name == null || $this->name == "") 									return false;
			if ($this->description == null || $this->description == "") 		return false;
			if ($this->owner == null || $this->owner == 0) 									return false;
			if ($this->file_location== null || $this->file_location == "") 	return false;
			if ($this->icon_location == null || $this->icon_location == "") return false;
			if ($this->price == null || $this->price == 0) 									return false;


			$this->conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_product SET
			name = '$this->name', 
			description = '$this->description',	
			owner = '$this->owner',	
			icon_location = '$this->icon_location',
			file_location = '$this->file_location',	
			file_size = '$this->file_size',	
			price = '$this->price'
			WHERE prod_id = '$this->id';";
			echo $update_query;
			$result = $this->conn->query($update_query);

			$this->conn->close();

			if (!$result) return false;

			return true;

		}

		static function getProductById($id, $status) {

			if ($id == null || $id == 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			 FROM tbl_product
			 JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id
			 WHERE tbl_product.prod_id = $id AND status = $status;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod = new Product();

			while ($row = $result->fetch_assoc()) {
				$prod->setValuesByArray($row);
			}

			return $prod;
		}

		static function getProductsByOwner($user_id, $status) {

			if ($user_id == null || $user_id == 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			 FROM tbl_product, tbl_dev_info WHERE owner = $user_id  AND status = $status
			 AND tbl_dev_info.user_id = tbl_product.owner;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$prod = new Product();
				$prod->setValuesByArray($row);
				$prod_array[$index] = $prod;
				$index++;
			}

			return $prod_array;

		}

		static function getTopProducts($count) {

			if ($count == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			FROM tbl_product
			JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id WHERE status = 1 AND approval = 1
			ORDER BY downloads DESC LIMIT $count;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$prod = new Product();
				$prod->setValuesByArray($row);
				$prod_array[$index] = $prod;
				$index++;
			}

			return $prod_array;

		}


		static function getNewProducts($count) {

			if ($count == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			FROM tbl_product
			JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id  WHERE status = 1  AND approval = 1
			ORDER BY `timestamp` DESC LIMIT $count;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$prod = new Product();
				$prod->setValuesByArray($row);
				$prod_array[$index] = $prod;
				$index++;
			}

			return $prod_array;

		}

		static function getMostRatedProducts($count) {

			if ($count == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			FROM tbl_product
			JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id WHERE status = 1  AND approval = 1
			ORDER BY downloads DESC LIMIT $count;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$prod = new Product();
				$prod->setValuesByArray($row);
				$prod_array[$index] = $prod;
				$index++;
			}

			return $prod_array;

		}

		static function getProducts($search) {

			if ($search == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			FROM tbl_product
			JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id
			WHERE name LIKE '%$search%' AND status = 1 AND approval = 1 ORDER BY NAME;";


			if ($search == "ALLPRODUCTS")
				$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
				FROM tbl_product
				JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id WHERE status = 1 AND approval = 1 
				ORDER BY name;";


			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$prod = new Product();
				$prod->setValuesByArray($row);
				$prod_array[$index] = $prod;
				$index++;
			}

			return $prod_array;

		}

		static function getProductsStartingWith($search) {

			if ($search == null) return false;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			FROM tbl_product
			JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id
			WHERE name LIKE '$search%' AND status = 1  AND approval = 1 ORDER BY NAME;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$prod = new Product();
				$prod->setValuesByArray($row);
				$prod_array[$index] = $prod;
				$index++;
			}

			return $prod_array;

		}

		static function getUnaprrovedProducts($count) {


			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
			FROM tbl_product
			JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id
			WHERE approval != 1 AND status = 1 ORDER BY approval LIMIT $count;";


			if ($count == null || $count == 0)
				$select_query = "SELECT *, DATE_FORMAT(tbl_product.timestamp, '%b %d, %Y') as tmstmp
				FROM tbl_product
				JOIN tbl_dev_info ON tbl_product.owner = tbl_dev_info.user_id
				WHERE approval != 1 AND status = 1 ORDER BY approval;";


			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$prod_array = range(1, $result->num_rows);

			$index = 0;
			while ($row = $result->fetch_assoc()) {
				$prod = new Product();
				$prod->setValuesByArray($row);
				$prod_array[$index] = $prod;
				$index++;
			}

			return $prod_array;

		}

		static function getPriceOfProduct($id) {

			if ($id == null || $id == 0) return -1;

			$conn = connectToDb("db_avalanche_store");

			$select_query = "SELECT price FROM tbl_product WHERE prod_id = $id;";

			$result = $conn->query($select_query);

			$conn->close();

			if ($result->num_rows <= 0) return false;

			$price = -1;

			while ($row = $result->fetch_assoc()) {
				$price = $row["price"];
			}

			return $price;
		}


		static function approveProduct($id) {

			if ($id == null || $id == 0) return -1;

			$conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_product SET approval = 1 WHERE prod_id = $id;";

			$result = $conn->query($update_query);

			$conn->close();

			if (!$result) return false;

			return true;
		}

		static function denyProduct($id) {

			if ($id == null || $id == 0) return -1;

			$conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_product SET approval = 2 WHERE prod_id = $id;";

			$result = $conn->query($update_query);

			$conn->close();

			if (!$result) return false;

			return true;
		}

		function incrementDownload() {
			if ($this->id == null || $this->id == 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_product SET downloads = downloads + 1  WHERE prod_id = $this->id;";

			$result = $conn->query($update_query);

			$conn->close();

			if (!$result) return false;

			return true;
		}

		static function deleteProduct($id) {

			if ($id == null || $id == 0) return false;

			$conn = connectToDb("db_avalanche_store");

			$update_query = "UPDATE tbl_product SET status = 0 WHERE prod_id = $id;";

			$result = $conn->query($update_query);

			$conn->close();

			if (!$result) return false;

			return true;
		}
	}

 ?>