<!DOCTYPE html>
<html>
<head>
	<title>Landslide</title>
	<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'navbar.php'; ?>
	<?php 

		require_once 'php/objects/objProduct.php';

		// Temporary.
		session_start();
		$_SESSION["userid"] = 1;
		$_SESSION["isdev"] = true;
	
		$search_term = $_REQUEST["search"];

	?>
<div class="lh-100">&nbsp;</div>
	<div class="container">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h1 class="f-45" align="center">Search Results</h1>
			<div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2">
				<form class="navbar-form" role="search" method="get" action="product-drawer.php">
					<div class="input-group">
						<input type="text" class="form-control" name="search" placeholder="Search" value="<?php echo($search_term)?>" />
						<div class="input-group-btn">
							<button class="btn bg-search btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
						</div>
					</div>
				</form>
			</div>
				<!-- Search results -->
				<div class="lh-100">&nbsp;</div>
				<div class="col-md-1"></div>
				<div class="col-md-10">

					<?php

	$prod = Product::getProducts($search_term);

							   if (!$prod) {

								   echo "<div>No products found</div>";

							   } else {

								   foreach ($prod as $product) {

									   if ($product->approval != 1 && !$_SESSION["isdev"]) continue;

					?>
					<div class='row'>
						<div class="col-md-6 col-xs-6">
							<div class='product_thumbnail_container'>
								<img class='product_thumbnail' src='<?php echo $product->icon_location ?>' />
							</div>
						</div>
						<div class="lh-15">&nbsp;</div>
						<div class='col-md-6 col-xs-6'>
							<div class="f-24"><strong><?php echo $product->name ?></strong></div>
							<div class=''><?php $product->owner_name ?></div>
							<div class='col-auto text-muted small f-14'>Downloads: <?php echo $product->downloads ?></div>
							<div class='col-auto text-muted small f-14'><?php echo $product->timestamp ?></div>
						</div>
						<a href='product.php?id=<?php echo $product->id ?>' class="link-overlay"></a>
					</div>

					<?php
								   } // end foreach
							   } // end if-else

					?>
				</div>
				<!-- End of Search results -->

		</div>
	</div>
<div class="lh-100">&nbsp;</div>
<?php include 'footer.php'; ?>
	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>