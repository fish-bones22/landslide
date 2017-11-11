<!DOCTYPE html>
<html lang="en">
<head>
	<title>Landslide</title>
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gray2">
	<?php 
		session_start();

		require_once 'php/objects/objProduct.php';
		require_once 'php/helper-functions/authenticate.php';

		// Temporary.

		include'navbar.php';

	?>
	<div class="container">
		<div class="lh-100">&nbsp;</div>
		<div class="row">
			<p class="f-24 col-md-3">Most Rated</p>
		</div>
		<?php 

		$rated_prod = Product::getMostRatedProducts(3);

		if (!$rated_prod) {

			echo "<div>No Products in this category</div>";

		} else {

		?>

		<!--Carousel-->
		<div id="thumbnail-preview-indicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#thumbnail-preview-indicators" data-slide-to="0" class="active">
						<div class="thumbnail">
							<img class="img-responsive" src='<?php echo $rated_prod[0]->icon_location ?>'/>
						</div>
					</li>
					<li data-target="#thumbnail-preview-indicators" data-slide-to="1">
						<div class="thumbnail">
							<img class="img-responsive" src='<?php echo $rated_prod[1]->icon_location ?>' />
						</div>
					</li>
					<li data-target="#thumbnail-preview-indicators" data-slide-to="2">
						<div class="thumbnail">
							<img class="img-responsive" src='<?php echo $rated_prod[2]->icon_location ?>' />
						</div>
					</li>
				</ol>

				<div class="carousel-inner">
				<div class="item slides active">
				<div class="slide-1" style="background-image:url('<?php echo $rated_prod[0]->icon_location ?>')"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1><?php echo $rated_prod[0]->name ?></h1>
							<p><?php echo $rated_prod[0]->description ?></p>
						</div>
					</div>
				</div>
				<div class="item slides">
					<div class="slide-2" style="background-image:url('<?php echo $rated_prod[1]->icon_location ?>')"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1><?php echo $rated_prod[1]->name ?></h1>
							<p><?php echo $rated_prod[1]->description ?></p>
						</div>
					</div>
				</div>
				<div class="item slides">
					<div class="slide-3"  style="background-image:url('<?php echo $rated_prod[2]->icon_location ?>')"></div>
					<div class="container">
						<div class="carousel-caption">
							<h1><?php echo $rated_prod[2]->name ?></h1>
							<p><?php echo $rated_prod[2]->description ?></p>
						</div>
					</div>
				</div>

			</div>
			<a class="left carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="prev"><i class="fa fa-chevron-left chevron-pos" style="font-size:2.5em;"></i></a>
			<a class="right carousel-control" href="#thumbnail-preview-indicators" role="button" data-slide="next"><i class="fa fa-chevron-right chevron-pos" style="font-size:2.5em;"></i></a>
		</div> 
<!--End carousel-->
	<?php 

	} // End if-else

	?>

		<div class="row">
			<!-- Top Products -->
			<div class="row">
				<div class="lh-100">&nbsp;</div>
				<div class="row">
					<p class="f-24">&emsp;&emsp;Top Products</p>
				</div>
				<div class="row">
				<?php

				$top_prod = Product::getTopProducts(5);

				if (!$top_prod) {

					echo "<div>No Products in this category</div>";

				} else {
					// Foreach
					foreach ($top_prod as $product) {

						if ($product->approval != 1 && $product->owner != $_SESSION["userid"]) continue;

				?>
				<div class="col-md-2 col-sm-4 col-xs-6">
					<div class='product-box hvr-bob hvr-float-shadow' data-toggle="popover" title="<?php echo $product->name?>" data-content="<?php echo $product->description ?>">
						<div class="ribbon-top"><span>Top Rated</span></div>
			          	<div class='product_thumbnail_container'>
							<img class='product_thumbnail' src='<?php echo $product->icon_location ?>' style="width:200px; height:200px; border-radius:25px;" />
			          	</div>
			          	<div class='prod_info'>
			             <!-- <div class="col-md-offset-1"><strong><?php echo $product->shortname ?></strong></div>
							<div class='col-md-offset-1'><?php echo $product->owner_name ?></div>-->
			    <!--         	  <div class='row'>
			              	<div class=' text-muted small'>Downloads:<?php echo $product->downloads ?></div>
			                <div class='text-muted small'><?php echo $product->timestamp ?></div>
			              </div> -->
						  <a href='product.php?id=<?php echo $product->id ?>' class="link-overlay"></a>
			          	</div>
			    	</div>
			    </div>
				<?php
					} // End Foreach
				} // End else if
				?>
		    </div>
			</div>
			<!-- End of Top -->

			<!-- Newest -->
			<div class="row">
				<div class="lh-75">&nbsp;</div>
				<div class="row">
					<p class="f-24">&emsp;&emsp;New Products</p>
				</div>
				<div class="row">
					<?php

					$new_prod = Product::getNewProducts(5);

					if (!$new_prod) {

						echo "<div>No Products in this category</div>";

					} else {

						foreach ($new_prod as $product) {

						if ($product->approval != 1 && $product->owner != $_SESSION["userid"]) continue;

					?>
					<div class="col-md-2 col-sm-4 col-xs-6">
						<div class="product-box hvr-bob hvr-float-shadow" data-toggle="popover" title="<?php echo $product->name?>" data-content="<?php echo $product->description ?>">
							<div class="ribbon-new"><span>Newest</span></div>
							<div class='product_thumbnail_container'>
								<img class='product_thumbnail' src='<?php echo $product->icon_location ?>' style="width:200px; height:200px; border-radius:25px;"/>
							</div>
							<div class=''>
								<!--<div><strong><?php echo $product->shortname ?></strong></div>
								<div class=''><?php echo $product->owner_name ?></div>-->
<!--							  <div class='row'>
									 <div class='col-auto text-muted small'>Downloads: <?php echo $product->downloads ?></div>
									 <div class='col-auto text-muted small'><?php echo $product->timestamp ?></div>
								  </div>--> 
							</div>
							<a href='product.php?id=<?php echo $product->id ?>' class="link-overlay"></a>
						</div>
					</div>

					<?php
					// 
						} // end foreach
					} // end if-else
					?>
				</div>
			</div>	<!-- End of Newest -->
			<div class="lh-75">&nbsp;</div>	
		</div>
	</div>
<?php include 'footer.php';?>
	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>