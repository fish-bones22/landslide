<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<div>
	<?php
	session_start();
	require_once 'php/helper-functions/dbconnect.php';
	require_once 'php/helper-functions/authenticate_.php';
	
	if (isset($_SESSION["userid"]))
		session_destroy();
	?>
	<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
	<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/login.min.css">
	<form action="php/helper-functions/user-login.php" method="post">
		<div class="container">
			<div id="login-box">
				<div class="logo">
					<img src="img/logo.png" class="img img-responsive center-block"/ style="width:140px; height:140px;">
					<h1 class="logo-caption f-30"><span class="tweak">L</span>ogin</h1>
				</div><!-- /.logo -->
				<div class="controls">
					<input type="text" name="user_email" placeholder="Email" class="form-control" />
					<div class="lh-15">&nbsp;</div>
					<input type="password" name="user_password" placeholder="Password" class="form-control" />
					<div class="lh-15">&nbsp;</div>
					<button type="submit" name="login" class="btn btn-default btn-block btn-custom">Login</button>
					<a href="register.php" class='col-md-offset-4' style="text-decoration:none;">&nbsp;Register here</a>
				</div><!-- /.controls -->
			</div><!-- /#login-box -->
		</div><!-- /.container -->
		<div id="particles-js"></div>
	</form>
</div>
	<script type="text/javascript" src="vendors/particle/particles.js"></script>
	<script type="text/javascript" src="vendors/particle/particles.min.js"></script>
	<script type="text/javascript" src="vendors/particle/app.js"></script>
</body>
</html>