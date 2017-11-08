<?php

require_once "php/objects/objCart.php";
require_once "php/objects/objUser.php";
        
// Temporary.
$_SESSION["userid"] = 1;
$_SESSION["isdev"] = true;

$cart = Cart::getCartByUser($_SESSION["userid"]);
$user = User::getUserById($_SESSION["userid"]);

?>
<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 140px; height: 140px;"/></a>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
     
      <ul class="nav navbar-nav navbar-left">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Search</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Name <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        <li><a href="#">Cart</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>


<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>







