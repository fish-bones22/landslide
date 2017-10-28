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
	<title><?php echo $prod->name; ?></title>
	<link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
			
	  <!-- TODO: 

			-Create PHP script to display product information	- IN PROGRESS

	  -->

		<div class="row">
			<div class="col-3">
				<img class="product_thumbnail_lg" src='<?php echo $prod->icon_location; ?>' />
			</div>
            <div class="col-2">
            
            </div>
			<div class="col-7">
				<div class="display-4"><?php echo $prod->name; ?></div>		
				<h3><?php echo $prod->owner_name; ?></h3>
				<?php 
					if ($_SESSION["userid"] == $prod->owner) {
						echo "<a href='dev-dashboard-add.php?id=$prod->id'>Edit</a>";
					}
				?>
				<div class="text-danger"><?php if ($prod->approval != 1) echo "<strong>This product is not yet approved by the admin.</strong> You are able to view this because you are a developer. Normal users will not be able to view this product." ?></div>
			</div>
		</div>
		<hr />

		<div class="row">
            <div class="col-5">
                <!-- Spacing -->
            </div>
                
            <div class="col-7">
                <!-- Description -->
                <div>
                    <p><?php echo $prod->description; ?></p>
                </div>

                <!--  Other information -->
                <div class="row">
                    <div class="form-group col-4">
                        A$<?php echo $prod->price ?>
                        <br>
                        <button class="btn btn-primary">Add to Cart</button>
                    </div>
                   
                    <div class="form-group col-4">
                        <div class="text-muted small">File size: <?php echo round($prod->file_size/1024)."KB"; ?></div>
                        <div class="text-muted small">Downloads: <?php echo $prod->downloads; ?></div>
                        <div class="text-muted small">Date Uploaded: <?php echo $prod->timestamp; ?></div>
                    </div>
                    
                    <!-- 
                        To EJ: Gawa ka ng JS function na ang magiging laman ng 'selected-rating'
                        ay depende sa ni-select na rating. -Sam
                    -->
                    <div class="form-group col-4">
                        <div class="">Rating: 4.3</div>
                        <input type="hidden" name="selected-rating">
                        <button class="btn btn-warning">1</button>
                        <button class="btn btn-warning">2</button>
                        <button class="btn btn-warning">3</button>
                        <button class="btn btn-warning">4</button>
                        <button class="btn btn-warning">5</button>
                    </div>
                </div>

            </div>



		  <!-- TODO: 

				-Create JS script to improve rating mechanism

		  -->


		</div>


		<!-- Other products by developer -->
		<div class="">
			<h5>Other products by <?php echo $prod->owner_name ?></h5>
		</div>


		<?php 

			$prod_array = Product::getProductsByOwner($_SESSION["userid"], 1);

			if (!$prod_array) {

				echo "<div>No Uploads</div>";

			} else {
				
				foreach ($prod_array as $product) {

					if ($product->id == $prod->id) continue;
					if ($product->approval != 1 && !$_SESSION["isdev"]) continue;

					echo "
						<a href='product.php?id=$product->id' class='row'>
							<div class=''>
								<img class='product_thumbnail' src='".$product->icon_location."' />
							</div>
							<div class='col-11'>
								<div><strong>$product->name</strong></div>
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

	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>