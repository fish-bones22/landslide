<!DOCTYPE html>
<html>
<head>
	<title>Landslide</title>
	<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-gray2">
	<?php 
		session_start();
		include_once 'navbar.php';
		require_once 'php/objects/objProduct.php';
	
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

					if ($search_term == "") {

						echo "<div>No Unicorns here.</div>";
					
					} else if (!$prod) {

						?>
						<div class="f-30"><i class="fa fa-exclamation-triangle"></i>&nbsp;No products found</div>
						<div class="lh-15">&nbsp;</div>
						<div class="f-17 text-danger">Your search -<?php echo($search_term)?>- did not match any documents.</div>
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<div class="lh-50">&nbsp;</div>
								<label class="f-30">Suggestions</label>
							</div>
						</div>
						<div class="lh-15">&nbsp;</div>
						<div class="col-md-12 col-xs-12">
							<ul>
								<li class="f-20">Make sure all words are spelled correctly</li>
								<li class="f-20">Try different keywords</li>
								<li class="f-20">Try more General words</li>
							</ul>
						</div>

					<?php } else {

						foreach ($prod as $product) {

						if ($product->approval != 1 && !$_SESSION["isdev"]) continue;

					?>
					<div class='row'>
						<div class="col-md-6 col-xs-6">
							<div class='product_thumbnail_container'>
								<img class='product_thumbnail' src='<?php echo $product->icon_location ?>' style="width:130px; height:130px; border-radius:20px;   box-shadow: 5px 5px 5px #888888;" />
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