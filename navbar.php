<?php

require_once "php/helper-functions/authenticate.php";
require_once "php/objects/objCart.php";
require_once "php/objects/objUser.php";
$cart = Cart::getCartByUser($_SESSION["userid"]);
$user = User::getUserById($_SESSION["userid"]);

?>
<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<nav class="navbar bg-black" style="margin-top: 60px;">
    <div class="navbar-header navbar-inverse">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <a class="navbar-brand" href="/landslide/"><img src="img/logo.png" class="logo-position" style="width: 140px; height: 140px;"/></a>
    <div class="container-fluid">
     <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav navbar-left">
            <?php if($user->type == 3) { ?>
            <li class="active col-md-4"><a href="admin.php" class="f-18">Admin</a></li>
            <?php } ?>
            <?php if($user->type == 2) { ?>
            <li class="active col-md-4"><a href="dev-dashboard.php" class="f-18">Developer</a></li>
            <?php } ?>
            <li class="col-md-4"><a href="/landslide/" class="f-18">Home</a></li>
            <li class="col-md-4"><a href="about.php" class="f-18">About</a></li>
            <?php if($user->type != 3 && $user->type != 2) { ?>
            <li class="col-md-4"><a href="about.php#contact" class="f-18">Contacts</a></li>
            <?php } ?>

        </ul>
        <div class="col-sm-3 col-md-3 col-md-offset-2 search-position">
            <form class="navbar-form" role="search" method="get" action="product-drawer.php">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn bg-gray btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <ul class="nav navbar-nav">
            <li class="popover-cart" >
                <input type="hidden" id="cart-val" value="<?php echo count($cart->cart_items);?>">
                <button type="button"
                        class="btn-cart"  
                        data-toggle="popover-cart" 
                        onclick="goToCheckout()"
                        title=" Number of Items: <?php echo count($cart->cart_items);?>" 
                        data-content="Total: <?php echo $cart->getTotalPrice();?>">
                    <i  class="fa fa-shopping-cart" aria-hidden="true" style="font-size:2.0em;"><span class="badge"><?php echo count($cart->cart_items);?></span></i>
                </button>
            </li>
            <li class="dropdown"><a class="dropdown-toggle bg-black" data-toggle="dropdown" href="#"><i class="fa fa-user-circle-o icon-x3" aria-hidden="true" style="font-size: 1.5em;"></i>&nbsp;<?php echo $user->fname;?></a>
                <ul class="dropdown-menu" style="background-color: #252525 !important;">
                    <li><a class="f-18" href="accountsettings.php#topup">
                        <span>
                            <img src="img/Avacoin.svg" style="width:20px; height:20px;">&nbsp;
                            <?php echo ($user->currency_amount == 0) ? "0" : $user->currency_amount ?>
                        </span>
                        </a></li>
                    <li class="divider"></li>
                    <li><a href="accountsettings.php" class="f-18" alt="top-up"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="/landslide/login.php" class="f-18"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Log out</a></li>
                </ul>
            </li>
        </ul>
      </div>
    </div>
</nav>
<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>