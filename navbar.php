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
<nav class="navbar bg-black" style="margin-top: 60px;">
    <div class="container-fluid">
        <ul class="nav navbar-nav" style="margin-left:120px;">
            <li class="active col-md-4"><a href="#" class="f-18">Home</a></li>
            <li class="col-md-4"><a href="#" class="f-18">About</a></li>
            <li class="col-md-4"><a href="#" class="f-18">Contacts</a></li>
        </ul>
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
        <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle bg-black" data-toggle="dropdown" href="#"><i class="fa fa-user icon-x3" style="font-size: 1.5em;"></i> <?php echo $user->name;?></a>
                <ul class="dropdown-menu">
                    <li><a href="#" class="f-18">Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="#" class="f-18">Log out</a></li>
                </ul>
            </li>
            <li class="popover-cart" >
                <button type="button" 
                        class="btn-cart"  
                        data-toggle="popover-cart" 
                        title=" Number of Items: <?php echo count($cart->cart_items);?>" 
                        data-content="Total: <?php echo $cart->getTotalPrice();?>">
                    <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:2.0em;"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>
    <a class="navbar-link" href="index.php"><img src="img/logo.png" style="width:140px; height: 140px; position:relative; margin-top:-115px; margin-left: 580px;"></a> 
<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>