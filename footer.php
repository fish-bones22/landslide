<link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
<link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/footer.css" rel="stylesheet" type="text/css">

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 footerleft ">
                <div class="logofooter"><img src="img/logo.png" style="width: 100px; height: 100px; margin-left: 80px; margin-top: -40px;"></div>
                <p>Landslide&trade; is an online store providing customers with a bucketful of quality products housed in a state-of-the-art web application service. Landslide is part of the ever-growing Disaster&trade; Group of Companies, headed by the umbrella company, Avalanche&trade; Corporation</p>

            </div>
            <div class="col-md-2 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">TOP PRODUCTS</h6>
                <div class="post">
            
            <?php
            require_once 'php/objects/objProduct.php';

            $top_prod = Product::getTopProducts(5);

            if (!$top_prod) {
                
                echo "<div>No Top Products</div>";

            } else {
                foreach ($top_prod as $product) {
                    if ($product->approval != 1) continue;
              
            ?>
            
                    <p><?php echo $product->name?><span><?php echo $product->timestamp?></span></p>
                    <!--<p>Lorem Ipsum><span>Inser Date</span></p>
                    <p>Lorem Ipsum<span>Inser Date</span></p>
                    <p>Lorem Ipsum<span>Inser Date</span></p>
                    <p>Lorem Ipsum<span>Inser Date</span></p>-->
            <?php
                } //close foreach 
            } //close else
            ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">LATEST PRODUCTS</h6>
                <div class="post">
            <?php
            require_once 'php/objects/objProduct.php';

            $new_prod = Product::getNewProducts(5);

            if (!$new_prod) {
                echo "<div>No Products</div>";
            } else {
                foreach ($new_prod as $product) {
                    if ($product->approval != 1) continue;
              
            ?>
                    <p><?php echo $product->name?><span><?php echo $product->timestamp?></span></p>
                    <!--<p>Lorem Ipsum<span>Inser Date</span></p>
                    <p>Lorem Ipsum<span>Inser Date</span></p>
                    <p>Lorem Ipsum<span>Inser Date</span></p>
                    <p>Lorem Ipsum<span>Inser Date</span></p>-->
            <?php
                } //close foreach 
            } //close else
            ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote>Avalanche&trade;</blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer start from here-->

<div class="copyright">
    <div class="container">
        <div class="col-md-6">
            <p>© 2017 - All Rights taken by Avalanche&trade;</p>
        </div>
        <div class="col-md-6">
            <ul class="bottom_ul">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>