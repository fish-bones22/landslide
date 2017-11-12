<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
        session_start();
        require_once 'php/helper-functions/authenticate.php';
        require_once "php/objects/objCart.php";
        require_once "php/objects/objUser.php";

        include 'navbar.php';?>
        <title>Checkout</title>
        <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-gray2">
        <div class="container">
            <div class="col-md-3 col-xs-12"></div>
            <!--convert to php loop every div.loop-->
           <div class="col-md-6 col-xs-12">
               <div class="lh-100">&nbsp;</div>
               <div class="f-45">Checkout</div>

               <?php

                  $cart = Cart::getCartByUser($_SESSION["userid"]);
                  $user = User::getUserById($_SESSION["userid"]);

                  $total_price = $cart->getTotalPrice();

                  while ($item = each($cart->cart_items)) {

                ?>
                <div class="loop">
                  <div class="checkout-box">
                    <button class="close btn-close">&times;</button>
                    <div class="row">
                      <div class="col-md-3 col-xs-3">
                        <div class="product-box-sm">
                          <img class="product_thumbnail" src="<?php echo $item[1]->product->icon_location ?>" style="width:100px; height:100px; border-radius:25px;">
                        </div>
                      </div>
                    <div class="col-md-5 col-xs-5">
                      <a class="label-price" style="text-decoration:none;" href="product.php?id=<?php echo $item[1]->product->id ?>" ><?php echo $item[1]->product->midname ?></a>
                   </div>
                   <div class="col-md-3 col-xs-3">
                     <p class="price"><span><img src="img/Avacoin.svg" style="width:20px; height:20px;" >&nbsp;<?php echo $item[1]->product->price ?></span></p>
                     <input type="hidden" class="prod-id" value="<?php echo $item[0] ?>" />
                   </div>
                 </div>
               </div>
               <div class="lh-15">&nbsp;</div> 
             </div>
               <?php
                  } // End while
               ?>

            
            <div class="lh-15">&nbsp;</div>
            <div class="checkout-box-total">
                <div class="col-md-5 col-xs-5"></div>
                <div class="col-md-3 col-xs-3">
                    <label class="f-36">Total:</label>
                </div>
                <!--Js function of total later after php loop-->
                <div class="col-md-4 col-xs-4">
                    <p class="total-price"><span><img src="img/Avacoin.svg" style="width:25px; height:25px;" >&nbsp;<span class="total-price" id="total-price"><?php echo $total_price ?></span></span></p>
                </div>
            </div>
             <div class="col-md-3 col-xs-3"></div>
             <div class="">
                 <input type="checkbox" class="f-17" id="terms"/><label class="f-14" for="terms">&nbsp;I agree to landslide Terms and Conditions</label>
             </div>
            <div class="col-md-4 col-xs-4">
                <a href="accountsettings.php#topup" style="text-decoration:none;" class="btn-link"><span><img src="img/Avacoin.svg" style="width:20px; height:20px;">&nbsp;Add Avacoins</span></a>
            </div>
            <div class="col-md-8 col-xs-8" align="right">
              <form method="POST" action="php/helper-functions/checkout.php">
                  <input type="hidden" id="user-id" value="<?php echo $_SESSION["userid"] ?>" />
                <?php 
                  if ($user->currency_amount < $total_price || isset($_REQUEST["insuff"])) {
                ?>  
<!--                   <button type="submit" class="btn-landslide" disabled="">Check out</button> -->
                  <div class="f-14 text-danger">You do not have enough Avacoins.</div>
                <?php } else { ?>
                  <button type="submit" id="btn-checkout" class="btn-landslide" disabled="">Check out</button>
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
        <script type="text/javascript" src="js/main.min.js"></script>

    </body>
</html>