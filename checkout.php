<!DOCTYPE html>
<html lang="en">

    <head>
        <?php 
        session_start();
        require_once 'php/helper-functions/authenticate.php';
        require_once "php/objects/objCart.php";
        require_once "php/objects/objUser.php";

        include 'navbar.php'; 

        ?>
        <title>Checkout</title>
        <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-gray2">
        <div class="container">
            <div class="col-md-3 col-xs-12"></div>
            <!--convert to php loop every div.loop-->
           <div class="col-md-6 col-xs-12">
               <div class="lh-100">&nbsp;</div>
               <div class="f-45">Checkout</div>
               <div class="-f-14">*Click each boxes to redirect their respective product page.</div>

               <?php

                  $cart = Cart::getCartByUser($_SESSION["userid"]);
                  $user = User::getUserById($_SESSION["userid"]);

                  $total_price = $cart->getTotalPrice();

                  if (count($cart->cart_items) < 0)
                    header("Location: index.php");

                  while ($item = each($cart->cart_items)) {

                ?>
               <div class="loop">
                   <div class="checkout-box">
                       <div class="col-md-4 col-xs-4">
                           <div class="product-box-sm">
                              <img class="product_thumbnail" src="<?php echo $item[1]->product->icon_location ?>">
                           </div>
                       </div>
                       <div class="col-md-5 col-xs-5">
                           <label class="label-price"><?php echo $item[1]->product->name ?></label> 
                       </div>
                       <div class="col-md-3 col-xs-3">
                           <p class="price"><span><img src="img/Avacoin.svg" style="width:25px; height:25px;" >&nbsp;<?php echo $item[1]->product->price ?></span></p>
                           <button class="btn-close"><i class="fa fa-close"></i></button>
                           <input type="hidden" class="prod-id" value="<?php echo $item[0] ?>" />
                       </div>
                   </div>
                   <div class="lh-15">&nbsp;</div> 
               </div>
               <?php
                  } // End while
               ?>

               <div class="col-md-3 col-xs-3"></div>
               <div class="col-md-9 col-xs-9">
                   <input type="checkbox" class="f-17">&nbsp;I agree to landslide Terms and Conditions</input>
               </div>
            <div class="lh-15">&nbsp;</div>
            <div class="checkout-box-total">
                <div class="col-md-5 col-xs-5"></div>
                <div class="col-md-3 col-xs-3">
                    <label class="f-36">Total:</label>
                </div>
                <!--Js function of total later after php loop-->
                <div class="col-md-4 col-xs-4">
                    <p class="total-price"><span><img src="img/Avacoin.svg" style="width:30px; height:30px;" >&nbsp;<span class="total-price" id="total-price"><?php echo $total_price ?></span></span></p>
                </div>
            </div>
            <div class="col-md-8 col-xs-8">
                <button class="btn-landslide"><span><img src="img/Avacoin.svg" style="width:30px; height:30px;">&nbsp;Add Avacoins</span></button>
            </div>
            <div class="col-md-4 col-xs-4">
              <form method="POST" action="php/helper-functions/checkout.php">
                <?php 
                  if ($user->currency_amount < $total_price || isset($_REQUEST["insuff"])) {
                ?>  
                <input type="submit" class="btn-landslide" value="&nbsp;Check out" disabled />
                <div class="f-14 alert alert-danger">You do not have anough Avacoins.</div>
                <?php } else { ?>
                  <input type="hidden" id="user-id" value="<?php echo $_SESSION["userid"] ?>">
                  <input type="submit" class="btn-landslide" value="&nbsp;Check out" />
                <?php
                  } // End if
                ?>
              </form>
            </div>
           </div>
        </div>
    <div class="lh-75">&nbsp;</div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>
</html>