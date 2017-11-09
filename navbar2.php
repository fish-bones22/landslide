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

<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header bg-gray">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 140px; height: 140px;"/></a>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav navbar">
        <li><a href="#" class="f-18">Home</a></li>
        <li><a href="#" class="f-18">About</a></li>
        <li><a href="#" class="f-18">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li>
        <a href="#">
             <div class="col-sm-3 col-md-3 col-md-offset-2">
              <form class="navbar-form" role="search" method="get" action="product-drawer.php">
                  <div class="input-group">
                      <div class="input-group-btn">
                          <button class="btn bg-gray btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                      </div>
                      <input type="text" class="form-control" name="search" placeholder="Search">
                  </div>
              </form>
            </div>
        </a>
        </li>
        <li><a href="#">Cart</a></li>
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
      </ul>
    </div>
</nav>


<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>







