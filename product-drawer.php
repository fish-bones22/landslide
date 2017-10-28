<!DOCTYPE html>
<html>
<head>
	<title>Landslide</title>
	<link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<?php 

		require_once 'php/objects/objProduct.php';

		// Temporary.
		session_start();
		$_SESSION["userid"] = 1;
		$_SESSION["isdev"] = true;
	
		$search_term = $_REQUEST["search"];

	?>

	<div class="container">

		<h1>Search Results</h1>

		<div class="form-group">
			<form action="product-drawer.php" method="get">
				<input type="text" name="search" value="<?php echo($search_term)?>" />
				<input type="submit" class="btn btn-primary" value="Search">
			</form>
		</div>

		<div class="row">

			<!-- Search results -->
			<div class="col-md-6">

				<?php

					$prod = Product::getProducts($search_term);

					if (!$prod) {

						echo "<div>No products found</div>";

					} else {
						
						foreach ($prod as $product) {

							if ($product->approval != 1 && !$_SESSION["isdev"]) continue;

							echo "
								<a href='product.php?id=$product->id' class='row'>
									<div class=''>
										<img class='product_thumbnail' src='".$product->icon_location."' />
									</div>
									<div class='col-xs-11'>
										<div><strong>$product->name</strong></div>
										<div class=''>$product->owner_name</div>
										<div class='row'>
											<div class='col-auto text-muted small'>Downloads: $product->downloads</div>
											<div class='col-auto text-muted small'>$product->timestamp</div>
										</div>
									</div>
								</a>
							";
						}
					}

				?>
			</div>
			<!-- End of Search results -->

		</div>

	</div>

	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>