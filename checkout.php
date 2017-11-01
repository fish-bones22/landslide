<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include'navbar.php'; ?>
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
               <div class="loop">
                   <div class="checkout-box" id="remove"><!--php name of the product to be replace in id to remove the contents using jquery if click-->
                       <div class="col-md-4">
                           <div class="product-box-sm">
                               <p class="f-17">Insert photo</p>
                           </div>
                       </div>
                       <div class="col-md-5 col-xs-5">
                           <label class="label-price">LODI</label> 
                       </div>
                       <div class="col-md-3 col-xs-5">
                           <p class="price"><span><img src="img/Avacoin.svg" style="width:25px; height:25px;" >&nbsp;230.00</span></p>
                           <button class="btn-close"><i class="fa fa-close"></i></button>
                       </div>
                   </div>
                   <div class="lh-15">&nbsp;</div> 
               </div>
               <div class="loop">
                   <div class="checkout-box" id="remove"><!--php name of the product to be replace in id to remove the contents using jquery if click-->
                       <div class="col-md-4">
                           <div class="product-box-sm">
                               <p class="f-17">Insert photo</p>
                           </div>
                       </div>
                       <div class="col-md-5 col-xs-12">
                           <label class="label-price">PETMALU</label> 
                       </div>
                       <div class="col-md-3 col-xs-12">
                           <p class="price"><span><img src="img/Avacoin.svg" style="width:25px; height:25px;" >&nbsp;230.00</span></p>
                           <button class="btn-close"><i class="fa fa-close"></i></button>
                       </div>
                   </div>
                   <div class="lh-15">&nbsp;</div> 
               </div>
               <div class="loop">
                   <div class="checkout-box" id="remove"><!--php name of the product to be replace in id to remove the contents using jquery if click-->
                       <div class="col-md-4">
                           <div class="product-box-sm">
                               <p class="f-17">Insert photo</p>
                           </div>
                       </div>
                       <div class="col-md-5 col-xs-12">
                           <label class="label-price">WERPA</label> 
                       </div>
                       <div class="col-md-3 col-xs-12">
                           <p class="price"><span><img src="img/Avacoin.svg" style="width:25px; height:25px;" >&nbsp;230.00</span></p>
                           <button class="btn-close"><i class="fa fa-close"></i></button>
                       </div>
                   </div>
                   <div class="lh-15">&nbsp;</div> 
               </div>
               <div class="col-md-3 col-xs-12"></div>
               <div class="col-md-9 col-xs-12">
                   <input type="checkbox" class="f-17">&nbsp;I agree to landslide Terms and Conditions</input>
               </div>
            <div class="lh-15">&nbsp;</div>
            <div class="checkout-box-total">
                <div class="col-md-5 col-xs-12"></div>
                <div class="col-md-3 col-xs-12">
                    <label class="f-36">Total:</label>
                </div>
                <!--Js function of total later after php loop-->
                <div class="col-md-4 col-xs-12">
                    <p class="total-price"><span><img src="img/Avacoin.svg" style="width:30px; height:30px;" >&nbsp;230.00</span></p>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <button class="btn-landslide"><span><img src="img/Avacoin.svg" style="width:30px; height:30px;">&nbsp;Add Avacoins</span></button>
            </div>
            <div class="col-md-4 col-xs-12">
                <button class="btn-landslide">&nbsp;Check out</button>
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