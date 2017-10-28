<?php 

	require "../objects/objProduct.php";

	session_start();
  
	//if (!isset($_SESSION["userid"])) return; // TODO: Change to redirect to login.
	//if (!isset($_SESSION["isdev"])) return;

	$errors = "";

	if ($_REQUEST["prod_name"] == "") $errors = join("", array($errors, "n"));
	if ($_REQUEST["prod_desc"] == "") $errors = join("", array($errors, "d"));
	if ($_REQUEST["prod_price"] == "") $errors = join("", array($errors, "p"));

	if ($errors != "") header("Location: ../../dev-dashboard-add.php?err=".$errors);

	$user_id = $_SESSION["userid"];
	//$user_id = 1;
	$dev_name = $_REQUEST["dev_name"];
	$name = $_REQUEST["prod_name"];
	$desc = $_REQUEST["prod_desc"];
	$price = $_REQUEST["prod_price"];

	$edit = 0;
	
	$product = new Product();

	if ($_REQUEST["prod_id"] != 0) {
		$edit = 1;
		$product = Product::getProductById($_REQUEST["prod_id"], 1);
	}

	/** 
	 * FILE HANDLING
	 */
	$has_upload = 0;
	$file_size = 0;

	// Check status of the file in server
	if (is_uploaded_file($_FILES["prod_file"]["tmp_name"]))
		$has_upload = 1;
	else
		if (!$edit)
			header("Location: ../../dev-dashboard-add.php?err=f"); // File error
		else {		
			$file_size = $product->file_size;
		}

	// File location
	$file_loc = "/landslide/product-files/zip/"."$name"."_".$dev_name.".zip";
	
	if ($has_upload) {

		$file_stream = fopen($_SERVER['DOCUMENT_ROOT'].$file_loc, 'w+');
		fclose($file_stream);

		$result = move_uploaded_file($_FILES["prod_file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$file_loc);
			
		if (!$result) // Failed to move file
			header("Location: ../../dev-dashboard-add.php?err=s"); // Server error

		$file_size = $_FILES["prod_file"]["size"];

	}


	/** 
	 * ICON FILE HANDLING
	 */
	$has_upload = 0;

	$icon_loc = "";

	// Check status of the file in server 
	if (is_uploaded_file($_FILES["prod_icon"]["tmp_name"])) {
		$has_upload = 1;
	} 
	else {
		// Use default icon
		if (!$edit)
			$icon_loc = "/landslide/product-files/icons/thumbnail_default.png";
		else
			$icon_loc = $product->icon_location;
	}

	if ($has_upload) {

		$icon_loc = "/landslide/product-files/icons/"."$name"."_".$dev_name;

		$file_stream = fopen($_SERVER['DOCUMENT_ROOT'].$icon_loc, 'w+');
		fclose($file_stream);

		$result = move_uploaded_file($_FILES["prod_icon"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$icon_loc);
			
		if (!$result) // Failed to move file
			$icon_loc = "/landslide/product-files/icons/thumbnail_default.png";

	}

	echo "HELLO";	

	$product->setValues($name, $desc,	$user_id,	$icon_loc,	$file_loc,	$file_size,	$price);

	if (!$edit && $product->addToDatabase()) {
		header("Location: ../../dev-dashboard.php?succ=1");
	} else if ($edit && $product->updateProduct()) {
		header("Location: ../../dev-dashboard.php?succ=1");
	} else {
		header("Location: ../../dev-dashboard-add.php?err=b");
	}

 ?>