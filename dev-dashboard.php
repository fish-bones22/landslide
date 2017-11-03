
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
	<?php include 'navbar.php';?>
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
		 <div class="lh-75">&nbsp;</div>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="f-36">DEVELOPER'S DASHBOARD</div>
			<div class="f-27"><?php echo $dev->dev_name;?></div>
			<div><?php echo $dev->dev_description;?></div>
			<!-- First Section -->
			<div>

				<div class="form-inline">				
					<h3>Products </h3>
					<div class="">
						<a href="dev-dashboard-add.php" class="btn-landslide">+ Add Products</a>
					</div>
				</div>
				<hr />

				<div class="row">
					<div class="col-auto f-17">Filter:</div>
					<div class="col-sm-3">
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
				?>
				<div class='row dashboard-product-box'>
					<a href='product.php?id=<?php echo $prod->id ?>'>
						<div class='col-md-2 col-xs-2'>
							<img class='product_thumbnail' src='<?php echo $prod->icon_location; ?>' />
						</div>
					</a>
					<div class='col-md-10 col-xs-9'>
						<div>
							<strong><a href='product.php?id= <?php echo $prod->id ?>'> <?php echo $prod->name ?></a></strong>
							<br>	
							<a href='dev-dashboard-add.php?id= <?php echo $prod->id ?>' class='small text-warning'>Edit</a>
							<a href='#' class='small text-danger'>Delete</a>

							<div class='col-auto small " <?php echo $approval_class ?>"'><?php echo $approval ?></div>
							<div class='col-auto text-muted small'>Downloads: <?php echo $prod->downloads ?></div>
							<div class='col-auto text-muted small'><?php echo $prod->timestamp ?></div>
						</div>
					</div>
				</div>

				<?php	}

				}

				?>

			</div>


			<!-- Second Section -->
			<div class="row">

				<h3 class="f-24">Information</h3>
				<hr />
				<!-- TODO:
Create PHP script to update the following information
-->
				<div class="f-17">Total Revenue:&emsp;20342 AC</div>
				<div class="f-17">Total Downloads:&emsp;5525</div>

			</div>


		</div>
		</div>
		<div class="col-md-2"></div>
		<div class="lh-75">&nbsp;</div>
<?php include 'footer.php'?>
	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
</body>
</html>