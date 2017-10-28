<?php 
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/helper-functions/dbconnect.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php';
	/**
	* Cl
	*/
	class Developer extends User
	{
		
		public $dev_name;
		public $dev_description;
		public $dev_id;

		function __construct()
		{
			# code...
		}

		function setValuesByArray($array) {
			
			parent::setValuesByArray($array);
			$this->dev_name = $array["dev_name"];
			$this->dev_description = $array["dev_desc"];
			$this->dev_id = $array["dev_id"];

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
	}
 ?>