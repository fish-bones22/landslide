<!DOCTYPE html>
<html lang="en">

<head>
	<?php 

		require_once "php/objects/objProduct.php";
				
		// Temporary.
		session_start();
		$_SESSION["userid"] = 1;
		$_SESSION["isdev"] = true;

		$id = $_REQUEST["id"];
		$prod = Product::getProductById($id, 1);

		if (!$prod) header("Location: dev-dashboard.php");
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
					<img class="product_thumbnail_lg" src='<?php echo $prod->icon_location; ?>' />
				</div>
			</div>
            <div class="col-md-2 col-xs-12"></div>
			<div class="col-md-7 col-xs-12">
				<div class="f-45"><?php echo $prod->name; ?></div>		
				<div class="f-24"><?php echo $prod->owner_name; ?></div>
				<?php 
					if ($_SESSION["userid"] == $prod->owner) {
						echo "<a href='dev-dashboard-add.php?id=$prod->id' class='f-17'>Edit</a>";
					}
				?>
				<div class="text-danger"><?php if ($prod->approval != 1) echo "<strong>This product is not yet approved by the admin.</strong> You are able to view this because you are a developer. Normal users will not be able to view this product." ?></div>
				<hr style="height:2px;background: #000 url(aa010307.gif) no-repeat scroll center;border:none;">
			</div>
		</div>


		<div class="row">
            <div class="col-md-5 col-xs-12">
                <!-- Spacing -->
            </div>
                
            <div class="col-md-7 col-xs-12">
                <!--  Other information -->
                <div class="row">
					<div class="form-group col-md-4 col-xs-12" style="margin-top:10px;">
						<div class="f-24">A$<?php echo $prod->price ?></div>
						<button class="btn-landslide" href="#">Add Cart</button>
                    </div>
                   
					<div class="form-group col-md-4 col-xs-12" style="margin-top:20px;">
                        <div class="text-muted small">File size: <?php echo round($prod->file_size/1024)."KB"; ?></div>
                        <div class="text-muted small">Downloads: <?php echo $prod->downloads; ?></div>
                        <div class="text-muted small">Date Uploaded: <?php echo $prod->timestamp; ?></div>
                    </div>
                    
                    <!-- 
                        To EJ: Gawa ka ng JS function na ang magiging laman ng 'selected-rating'
                        ay depende sa ni-select na rating. -Sam
                    -->
                    <div class="form-group col-md-4 col-xs-12">
                        <div id="product"></div>
                    </div>
                </div>

            </div>



		  <!-- TODO: 

				-Create JS script to improve rating mechanism

		  -->


		</div>


<!--		 Other products by developer -->
		<div class="row">
			<div class="lh-75">&nbsp;</div>
			<p class="f-24">Other products by <?php echo $prod->owner_name ?></p>
		</div>

		<div class="row">
			<?php 

	$prod_array = Product::getProductsByOwner($_SESSION["userid"], 1);

				if (!$prod_array) {

					echo "<div>No Uploads</div>";

				} else {

					foreach ($prod_array as $product) {

						if ($product->id == $prod->id) continue;
						if ($product->approval != 1 && !$_SESSION["isdev"]) continue;
			?>
			<div class="col-md-3">
				<div class='product-box hvr-bob' data-toggle="popover" title="<?php echo $product->name?>" data-content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex cupiditate esse magni unde sapiente, perspiciatis iure quos possimus! Quidem, impedit ab?">
					<div class='product_thumbnail_container'>
						<img class='product_thumbnail' src='<?php echo $product->icon_location ?>' />
					</div>
					<div class='prod_info'>
						<div><strong><?php echo $product->name ?></strong></div>
						<div class=''><?php echo $product->owner_name ?></div>
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

</body>
</html>