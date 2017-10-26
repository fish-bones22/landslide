<? php
	
	require 'php/dbconnect.php';

	$conn = connectToDb("db_avalanche_store");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="container" >

		<div class="col-md-6 offset-md-3">
				
		<div class="display-4">Add New Product</div>

			<!-- Name -->
			<div class="form-group">
				<div class=""><label class="" for="prod-name">Name</label></div>
				<div class=""><input type="text" class="form-control" id="prod-name" /></div>
			</div>
			<!-- Description -->
			<div class="form-group">
				<div class=""><label class="" for="prod-desc">Description</label></div>
				<div class=""><textarea class="form-control" id="prod-desc"></textarea></div>
			</div>
			<!-- Upload file -->
			<div class="form-group">
				<div class=""><label class="" for="prod-file">Upload File</label></div>
				<div class=""><input type="file" class="form-control-file" id="prod-file" /></div>
			</div>
			<!-- Icon -->
			<div class="form-group">
				<div class=""><label class="" for="prod-icon-loc">Upload Thumbnail</label></div>
				<div class=""><input type="file" class="form-control-file" id="prod-icon-loc" /></div>
				<img src="res/web-img/thumbnail_default.png" style="height:64px" class="img-fluid" id="prod-icon" />
			</div>

			<div class="form-inline">
				<div class="">
					<input type="button" class="btn btn-primary" id="prod-submit" value="Add" />
					<input type="button" class="btn btn-secondary" id="prod-cancel" value="Reset" />
				</div>
				</div>
			</div>

		</div>
	</div>

	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>