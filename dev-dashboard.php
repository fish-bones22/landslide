
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="container">
		<?php 

				require_once "php/objects/objDeveloper.php";

				// Temporary.
				session_start();
				$_SESSION["userid"] = 1;
				$_SESSION["isdev"] = true;

				$dev = Developer::getDeveloperById($_SESSION["userid"]);

		 ?>
		
		<div class="display-3">Developer</div>
		<div class="display-4"><?php echo $dev->dev_name;?></div>
		<div><?php echo $dev->dev_description;?></div>
		<!-- First Section -->
		<div class="">

			<div class="form-inline">				
				<h3>Products </h3>
				<div class="">
					<a href="dev-dashboard-add.php" class="btn btn-secondary">+</a>
				</div>
			</div>
			<hr />

			<div class="row">
				<div class="col-auto">Filter:</div>
				<div class="col-sm-9">
					<select class="form-control" id="status-filter">
						<option value="-1">All</option>
						<option value="0">Pending</option>
						<option value="1">Approved</option>
						<option value="2">Denied</option>
					</select>
				</div>
			</div>
			
		  <!-- TODO: 

				-Create PHP script to generate the list below - IN PROGRESS
				-Create JS script for filtering product list based on approval

		  -->

			<!-- Products List - alphabetical order -->
			<?php
				
				require_once "php/objects/objProduct.php";

				$prod_array = Product::getProductsByOwner($_SESSION["userid"], 1);

				if (!$prod_array) {

					echo "<div>No Uploads</div>";

				} else {

					foreach ($prod_array as $prod) {

						$approval = "Denied";
						$approval_class = "text-danger";

						if ($prod->approval == 0) {
							$approval = "Pending";
							$approval_class = "text-warning";
						} else if ($prod->approval == 1) {
							$approval = "Approved";
							$approval_class = "text-success";
						}

						echo "
								<div class='row'>
									<a href='product.php?id=$prod->id'>
										<div class='product_thumbnail_container'>
											<img class='product_thumbnail' src='".$prod->icon_location."' />
										</div>
									</a>
									<div class='col'>
										<div>
											<strong><a href='product.php?id=$prod->id'>".$prod->name."</a></strong>
											<a href='dev-dashboard-add.php?id=$prod->id' class='small'>Edit</a>
											<a href='#' class='small'>Delete</a>
										</div>
										<div class='row'>
											<div class='col-auto small ".$approval_class."'>".$approval."</div>
											<div class='col-auto text-muted small'>Downloads: ".$prod->downloads."</div>
											<div class='col-auto text-muted small'>".$prod->timestamp."</div>
										</div>
									</div>
								</div>";

					}

				}

			?>

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