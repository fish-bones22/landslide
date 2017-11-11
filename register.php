<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-gray2">

	<form action="php/helper-functions/add-user.php" method="post">
	<div class="col-md-4 col-xs-2"></div>
	<div class="col-md-4 col-xs-8">
		<div class="row">
		<div class="lh-50">&nbsp;</div>
		<div class="f-34" align="center">Register Here</div>
		<div class="lh-50">&nbsp;</div>
			<div class="form-group">
				<label class="f-17">Email:</label>
				<input class="f-17 form-control" type="email" name="email">
			</div>
			<div class="form-group">
				<label class="f-17">Password:</label>
				<input type="password" name="password" class="form-control f-17">
			</div>
			<div class="form-group">
				<label class="f-17">Confirm Password:</label>
				<input type="password" name="confirmPw" class="form-control f-17">	
			</div>
			<div class="form-group">
				<label class="f-17">First Name:</label>
				<input type="text" name="fname" class="form-control f-17">
			</div>
			<div class="form-group">
				<label class="f-17">Last Name:</label>
				<input type="text" name="lname" class="form-control f-17">
			</div>
			<div class="form-group">
				<div class="col-md-6 col-xs-6">
					<label class="f-17">Gender:</label>
					<select name="gender" class="form-control f-17">
						<option value="1">Male</option>
						<option value="2">Female</option>
					</select>
				</div>
				<div class="col-md-6 col-xs-6">
					<label class="f-17">Type:</label>
					<select name="type" class="form-control f-17">
						<option value="1">Client</option>
						<option value="2">Developer</option>
					</select>
				</div>
			</div>
			<div class="lh-50">&nbsp;</div>
			<div class="col-md-offset-5 col-xs-offset-5">
				<input type="submit" name="register" class="btn-landslide-approve">
			</div>
		</div>
	</div>
	<div class="col-md-4 col-xs-2"></div>
	</form>
	<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
</body>
</html>