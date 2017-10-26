<? php
	
	require 'php/dbconnect.php';

	$conn = connectToDb("db_avalanche_store");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="container">
		
		<div class="display-4">Developer</div>

		<!-- First Section -->
		<div class="">

			<div class="form-inline">				
				<h3>Products </h3>
				<div class="">
					<a href="dev-dashboard-add.php" class="btn btn-secondary">+</a>
				</div>
			</div>
			<hr />
			
		  <!-- TODO: 

				-Create PHP script to generate the list below
				-Create JS script for filtering product list based on approval

		  -->

			<!-- Products List - alphabetical order -->

			<div class="row">
				<div class="">
					<a href="#"><img class="product_thumbnail" src="res/web-img/thumbnail_default.png" /></a>
				</div>
				<div class="col">
					<div>
						<strong><a href="#" class="">Title of Product</a></strong>
						<a href="#" class="small">Edit</a>
						<a href="#" class="small">Delete</a>
					</div>
					<div class="row">
						<div class="col-auto small text-success">Approved</div>
						<div class="col-auto text-muted small">Downloads: 5525</div>
						<div class="col-auto text-muted small">July 5, 2017</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="">
					<a href="#"><img class="product_thumbnail" src="res/web-img/thumbnail_default.png" /></a>
				</div>
				<div class="col-10">
					<div>
						<strong><a href="#" class="">Title of Product</a></strong>
						<a href="#" class="small">Edit</a>
						<a href="#" class="small">Delete</a>
					</div>
					<div class="row">
						<div class="col-auto small text-warning">Pending</div>
						<div class="col-auto text-muted small">Downloads: 0</div>
						<div class="col-auto text-muted small">Aug 2, 2017</div>
					</div>
				</div>
				<div class="col-1">
				</div>
			</div>

			<div class="row">
				<div class="">
					<a href="#"><img class="product_thumbnail" src="res/web-img/thumbnail_default.png" /></a>
				</div>
				<div class="col-11">
					<div>
						<strong><a href="#" class="">Title of Product</a></strong>
						<a href="#" class="small">Edit</a>
						<a href="#" class="small">Delete</a>
					</div>
					<div class="row">
						<div class="col-auto small text-danger">Rejected</div>
						<div class="col-auto text-muted small">Downloads: 0</div>
						<div class="col-auto text-muted small">Sept 21, 2017</div>
					</div>
				</div>
			</div>


		</div>


		<!-- Second Section -->
		<div class="">

			<h3>Information</h3>
			<hr />
			<!-- TODO:
				Create PHP script to update the following information
			-->
			<div class="">Total Revenue:&emsp;20342 AC</div>
			<div class="">Total Downloads:&emsp;5525</div>

		</div>


	</div>

	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>