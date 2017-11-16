<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'php/helper-functions/authenticate_.php';?>
<title>Register</title>
	<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/style.min.css">
</head>
<body class="bg-gray2">
<form action="/landslide/php/helper-functions/add-dev.php" method="post">
	<div class="col-md-4 col-xs-2"></div>
	<div class="col-md-4 col-xs-8">
		<div class="lh-100">&nbsp;</div>
		<div class="f-34" align="center">Create Developer Account</div>
		<div class="lh-50">&nbsp;</div>
			<div class="form-group">
				<label class="f-17">Developer Name</label>
				<input type="text" name="devName" class="form-control f-17">
			</div>
			<div class="form-group">
				<label class="f-17">Developer Description</label>
				<input type="text" name="devDesc" class="form-control f-17">
			</div>
			<div class="col-md-4 col-xs-4"></div>
			<div class="col-md-4 col-xs-4">
				<input type="hidden" name="email" value="<?php echo $_REQUEST["email"] ?>">
				<input type="submit" name="register" class="btn-landslide-approve">
			</div>
			<div class="col-md-4 col-xs-4"></div>
	</div>
	<div class="col-md-4 col-xs-2"></div>
</form>
</body>
</html>