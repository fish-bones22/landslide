<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
		session_start();
		require_once "php/helper-functions/authenticate.php";
		require_once "php/objects/objProduct.php";
		require_once "php/objects/objCart.php";
				

		$id = $_REQUEST["id"];
		$prod = Product::getProductById($id, 1);

		$cart = Cart::getCartByUser($_SESSION["userid"]);

		$owner = $prod->owner;

		if (!$prod) header("Location: /landslide/");
	 ?>
	 <?php include'navbar.php'; ?>
	<title><?php echo $prod->name; ?></title>
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="css/rating.css" rel="stylesheet" type="text/css"/> 
	<script type="text/javascript" src="js/rating.min.js"></script>
</head>
<body class="bg-gray2">
	<div class="container">
			
	  <!-- TODO: 

			-Create PHP script to display product information	- IN PROGRESS

	  -->
		<div class="lh-100">&nbsp;</div>
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<div class="product-box-lg">
					<img class="product_thumbnail_lg" src='<?php echo $prod->icon_location; ?>' style="width:300px; height: 300px; border-radius:25px;" />
				</div>
			</div>
            <div class="col-md-2 col-xs-12"></div>
			<div class="col-md-7 col-xs-12">
				<div class="lh-50">&nbsp;</div>
				<div class="f-45"><?php echo $prod->name; ?></div>		
				<div class="f-24"><?php echo $prod->owner_name; ?></div>
				<?php 
				if ($_SESSION["userid"] == $prod->owner && $_SESSION["isdev"]) {
					echo "<a href='dev-dashboard-add.php?id=$prod->id' class='f-17'>Edit</a>";
				?>
				<div class="text-danger"><?php if ($prod->approval != 1) echo "<strong>This product is not yet approved by the admin.</strong> You are able to view this because you are a developer. Normal users will not be able to view this product." ?></div>
				<?php } 

				if ($_SESSION["userid"] == $prod->owner && !$_SESSION["isdev"]) {
					echo "<div class='f-15 text-muted'>Note: Although you own this product, you are not allowed to edit this because your account is not a developer. Please upgrade into a developer account to enable editig.</div>";
				}
				?>
				<hr style="height:2px;background: #000  no-repeat scroll center;border:none;">
				<div class="f-17"><?php echo $prod->description; ?></div>
			</div>
		</div>


		<div class="row">
            <div class="col-md-5 col-xs-12">
                <!-- Spacing -->
            </div>
                
            <div class="col-md-7 col-xs-12">
                <!--  Other information -->
                <div class="row">                   
                	<div class="form-group col-md-3 col-xs-12">
	                    <?php
                    	$rating = 0;
						// If not yet rated
						if ($cart->hasProduct($prod->id)) {
							$rating = $cart->cart_items["".$prod->id]->rating;
						}
						?>
                    	<input type="hidden" id="rating-value" value="<?php echo $rating; ?>" />
                        <div id="product"></div>
                    	<div class="f-12">Please rate before adding</div>
                    </div>

					<div class="form-group col-md-4 col-xs-12" style="margin-top:10px;" align="center">
						<div class="f-20">Price: <span class="f-24"><img src="img/Avacoin.svg" style="width:25px; height:25px;" ><?php echo $prod->price ?></span></div>

						<?php
						if ($prod->approval == 1) {
						// If not yet added
							if (!$cart->hasProduct($prod->id)) {
						?>
						<button class="btn-landslide" id="add-to-cart-btn" onclick="<?php echo "addToCart(".$_SESSION['userid'].",$prod->id)"; ?>" disabled="">Add to Cart</button>
						<?php } // end if
							else { ?>
						<button class="btn-landslide" id="add-to-cart-btn" disabled="">Added</button>
						<?php } // end else ?>
						<button 
						class="btn-link" 
						<?php if ($prod->approval == 1 && !$cart->hasProduct($prod->id)) echo 'disabled=""' ?>
						id="proceed" 
						onclick="window.location.href = '/landslide/checkout.php';" >Proceed to Checkout</button>
						<?php } ?>

                    </div>
                   
					<div class="form-group col-md-4 col-xs-12" style="margin-top:40px;">
                        <div class="text-muted small">File size: <?php echo round($prod->file_size/1024)."KB"; ?></div>
                        <div class="text-muted small">Downloads: <?php echo $prod->downloads; ?></div>
                        <div class="text-muted small">Date Uploaded: <?php echo $prod->timestamp; ?></div>
                        <div class="lh-15">&nbsp;</div>
                    </div>

                </div>

            </div>


		</div>


		<!-- Other products by developer -->
		<div class="row">
			<div class="lh-75">&nbsp;</div>
			<p class="f-24">Other products by <?php echo $prod->owner_name ?></p>
		</div>

		<div class="row">
			<?php
			$prod_array = Product::getProductsByOwner($owner, 1);

			if (!$prod_array) {

				echo "<div>No Uploads</div>";

			} else {

				foreach ($prod_array as $product) {

					if ($product->id == $prod->id) continue;
					if ($product->approval != 1 && !$_SESSION["isdev"]) continue;
			?>
			<div class="col-md-3">
				<div class='product-box hvr-bob hvr-float-shadow' data-toggle="popover" title="<?php echo $product->name?>" data-content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex cupiditate esse magni unde sapiente, perspiciatis iure quos possimus! Quidem, impedit ab?">
					<div class='product_thumbnail_container'>
						<img class='product_thumbnail' src='<?php echo $product->icon_location ?>' style="width:200px; height:200px; border-radius:25px;"/>
					</div>
					<div class='prod_info'>
<!--						<div><strong><?php echo $product->name ?></strong></div>
						<div class=''><?php echo $product->owner_name ?></div>-->
						<a href='product.php?id=<?php echo $product->id ?>' class="link-overlay"></a>
					</div>
				</div>
			</div>
			<?php			
					}
				}
			?>

		</div>
	</div>
	<div class="lh-75">&nbsp;</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/addToCart.js"></script>

</body>
</html>