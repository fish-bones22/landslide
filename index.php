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

	?>

	<div class="container">

		<h1>Landslide</h1>
		<div class="display-3">Online Store</div>

		<div class="form-group">
			<form action="product-drawer.php" method="get">
				<input type="text" name="search" />
				<input type="submit" class="btn btn-primary" value="Search">
			</form>
		</div>

		<div class="row">

			<!-- Top Products -->
			<div class="row">
				<div class="display-4 col-md-12">Top Products</div>
				<?php
					
					$top_prod = Product::getTopProducts(5);

					if (!$top_prod) {

						echo "<div>No Products in this category</div>";

					} else {
						
						foreach ($top_prod as $product) {

							if ($product->approval != 1 && !$_SESSION["isdev"]) continue;

							echo "
                                        <a href='product.php?id=$product->id' class='row product-box'>
                                        <div class='product_thumbnail_container'>
                                            <img class='product_thumbnail' src='".$product->icon_location."' />
                                        </div>
                                        <div class='col-xs-2'>
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
			<!-- End of Top -->

			<!-- Newest -->
                <div class="row">
                    <div class="display-4 col-md-12">New Products</div>
                    <?php

                        $new_prod = Product::getNewProducts(5);

                        if (!$new_prod) {

                            echo "<div>No Products in this category</div>";

                        } else {

                            foreach ($new_prod as $product) {

                                if ($product->approval != 1 && !$_SESSION["isdev"]) continue;

                                echo "
                                        <a href='product.php?id=$product->id' class='row product-box'>
                                            <div class='product_thumbnail_container'>
                                                <img class='product_thumbnail' src='".$product->icon_location."' />
                                            </div>
                                            <div class='col-xs-2'>
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
			<!-- End of Newest -->

		</div>

	</div>

	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>