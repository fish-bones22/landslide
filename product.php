<? php
	
	require 'php/dbconnect.php';

	$conn = connectToDb("db_avalanche_store");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Name</title>
	<link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="container">
			
	  <!-- TODO: 

			-Create PHP script to display product information

	  -->

		<div class="row">
			<div class="">
				<img class="product_thumbnail_lg" src="res/web-img/thumbnail_default.png" />
			</div>
			<div class="col-8">
				<div class="display-4">Product Name</div>		
				<h3>Developer Name</h3>
			</div>
		</div>

		<hr />

		<div class="">

			<!-- Description -->
			<div class="">
				<p>Product description. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>

			<!--  Other information -->
			<div class="form-group">
				<div class="text-muted small">File size: 2.1MB</div>
				<div class="text-muted small">Downloads: 5525</div>
				<div class="text-muted small">Date Uploaded: July 5, 2015</div>
			</div>

			<div class="form-group">
				<button class="btn btn-primary">Add to Cart</button>
			</div>

			<div class="form-group">
				<div class="">Rating: 4.3</div>
				<button class="btn btn-warning">1</button>
				<button class="btn btn-warning">2</button>
				<button class="btn btn-warning">3</button>
				<button class="btn btn-warning">4</button>
				<button class="btn btn-warning">5</button>
			</div>

		</div>


		<!-- Other products by developer -->
		<div class="">
			<h5>Other products by Developer Name</h5>
		</div>

		<a href="#" class="row">
			<div class="">
				<img class="product_thumbnail" src="res/web-img/thumbnail_default.png" />
			</div>
			<div class="col-11">
				<div><strong>Title of Product</strong></div>
				<div class="row">
					<div class="col-auto text-muted small">Downloads: 0</div>
					<div class="col-auto text-muted small">Sept 21, 2017</div>
				</div>
			</div>
		</a>


	</div>

	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>