<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<?php 
session_start();
include'navbar.php';
?>
<body class="bg-gray2">
	<div class="lh-75">&nbsp;</div>
	<div class="container" >
		<div class="col-md-2"></div>
		<div class="col-md-8">
					
		<?php
		
		require_once "php/objects/objProduct.php";
		
		// Temporary.

		$edit = 0;

		if (isset($_REQUEST["id"]) && $_SESSION["isdev"]) {
			 $edit = 1;
			 $prod = Product::getProductById($_REQUEST["id"], 1);
			 
			 // If no product
			 if (!$prod) $edit = 0;

			 // If not owner
			 else if ($prod->owner != $_SESSION["userid"]) $edit = 0;
		}

		?>
			<div class='row'>
				<div class="f-45" align="center">
					<?php if ($edit) echo "Edit"; else echo "Add New"; ?> Product
				</div>
			</div>
			<div class="lh-15">&nbsp;</div>
			<form method="post" action="php/helper-functions/dev-add-product.php" enctype="multipart/form-data">
				<!-- Name -->
				<div class="form-group">
					<div class="f-17"><label class="" for="prod-name" >Name</label></div>
					<div class="f-17">
						<input type="text" class="form-control" maxlength="18" id="prod-name" name="prod_name" <?php if ($edit) echo "value=\"$prod->name\""; ?> />
					</div>
				</div>
				<!-- Description -->
				<div class="form-group">
					<div class="f-17"><label class="" for="prod-desc">Description</label></div>
					<div class="f-17">
						<textarea class="form-control" id="prod-desc" name="prod_desc" maxlength="511"><?php if ($edit) echo $prod->description; ?></textarea>
					</div>
				</div>
				<!-- Price -->
				<div class="form-group">
					<div class="f-17"><label class="" for="prod-price">Price</label></div>
					<div class="f-17">
						<input type="number" class="form-control" id="prod-price" name="prod_price" <?php if ($edit) echo "value='$prod->price'"; ?> />
					</div>
				</div>
				<!-- Upload file -->
				<div class="lh-75">&nbsp;</div>
				<div class="form-group">
					<div class="">
						<label class="f-17" for="prod-file">
							<?php if ($edit) echo "Change"; else echo "Upload"?> File
						</label>
					</div>
					<div class="f-17">
						<input type="file" class="form-control-file" id="prod-file" accept=".zip" name="prod_file"/>
					</div>
				</div>
				<!-- Icon -->
				<!-- TODO: Add JS function to automatically set the 'src' of <img> to the image selected. -->
				<div class="form-group">
					<div class="">
						<label class="" for="prod-icon-loc">
							<?php if ($edit) echo "Change"; else echo "Upload"?> Thumbnail
						</label>
					</div>
					<div class="">
						<input type="file" class="form-control-file" id="prod-icon-loc" accept="image/*" name="prod_icon" />
					</div>
					<?php 
						$src = "res/web-img/thumbnail_default.png";
						if ($edit)
							$src = $prod->icon_location;
					?>
					<img src="<?php echo $src; ?>" style="height:64px" class="img-fluid" id="prod-icon" />
				</div>

				<div class="form-inline">
					<div class="">
						<input type="submit" class="btn-landslide-casual" id="prod-submit" value="<?php if ($edit) echo "Save"; else echo "+Add"; ?>" />
						<input type="reset" class="btn-landslide-casual" id="prod-cancel" value="Reset" />
					</div>
					</div>
				</div>
				<div class="col-md-2"></div>

				<!-- Hiddens -->
				<!-- TODO: Use PHP script to appropriately fill out information-->
				<input type="hidden" name="dev_name" value="Dev Name" />
				<input type="hidden" name="prod_id" value="<?php if ($edit) echo $prod->id; else echo 0; 	?>"/>

			</form>

		</div>
	</div>
	<div class="lh-75">&nbsp;</div>
	<?php include'footer.php'; ?>
	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.min.js"></script>
</body>
</html>