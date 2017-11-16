<!DOCTYPE html>
<html>
<head>
	<title>Landslide</title>
	<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.min.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-gray2">
	<?php 
		session_start();
		//include_once 'navbar.php';
		require_once 'php/objects/objProduct.php';

	?>
<div class="lh-100">&nbsp;</div>
	<div class="container" align="center">
		<div class="col-md-12">
			<h1 class="f-45" align="center">Unauthorized</h1>
				<!-- Search results -->
				<div class="lh-100">&nbsp;</div>
				<div class="col-md-1"></div>
				<div class="col-md-10">

					<div class="f-45">This server is unauthorized.</div>
					<div class="f-20">Please contact Avalanche Development Team.</div>
				</div>
				<!-- End of Search results -->

		</div>
	</div>
	<div class="lh-100">&nbsp;</div>
	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.min.js"></script>
</body>
</html>