<!DOCTYPE html>
<html>
<head>
	<title>Landslide</title>
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray2">
	<?php include'navbar.php'; ?>
	<?php 

		require_once 'php/objects/objProduct.php';

		// Temporary.
		session_start();
		$_SESSION["userid"] = 1;
		$_SESSION["isdev"] = true;

	?>
	<div class="container">

		<h1 class="f-40"><strong>Landslide</strong></h1><br>
		
		<p class="f-24">Top Products</p>
		<!--Carousel-->
		<div id="thumbnail-preview-indicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#thumbnail-preview-indicators" data-slide-to="0" class="active">
						<div class="thumbnail">
							<img class="img-responsive" src='img/job11.jpg' />
						</div>
					</li>
					<li data-target="#thumbnail-preview-indicators" data-slide-to="1">
						<div class="thumbnail">
							<img class="img-responsive" src='img/job11.jpg' />
						</div>
					</li>
					<li data-target="#thumbnail-preview-indicators" data-slide-to="2">
						<div class="thumbnail">
							<img class="img-responsive" src='img/job11.jpg' />
						</div>
					</li>
				</ol>
				<div class="carousel-inner">
				<div class="item slides active">
				<div class="slide-1"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1>THESIS DEFENSE IS COMING</h1>
							<p>Wala pa ring chapter 4 at 5</p>
						</div>
					</div>
				</div>
				<div class="item slides">
					<div class="slide-2"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1>THESIS DEFENSE IS COMING</h1>
							<p>Wala pa ring chapter 4 at 5</p>
						</div>
					</div>
				</div>
				<div class="item slides">
					<div class="slide-3"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1>THESIS DEFENSE IS COMING</h1>
							<p>Wala pa ring chapter 4 at 5</p>
						</div>
					</div>
				</div>
			</div>
		<a class="left carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="prev"><i class="fa fa-chevron-left chevron-pos" style="font-size:2.5em;"></i></a>
		<a class="right carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="next"><i class="fa fa-chevron-right chevron-pos" style="font-size:2.5em;"></i></a>
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