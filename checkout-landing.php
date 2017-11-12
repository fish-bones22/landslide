<!DOCTYPE html>
<html lang="en">

    <head>
        <?php 
        session_start();
        include'navbar.php';
        require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objTransaction.php'; 

        if (!isset($_REQUEST["trans"])) {
            header("Location: /landslide/");
        }

        $transactions = Transaction::getTransactionsById($_REQUEST["trans"]);

        if (!$transactions || count($transactions) <= 0) 
            header("Location: /landslide/");

        $user = User::getUserById($_SESSION["userid"]);

        ?>
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
               <div class="f-45">Checkout Successful</div>
               <div class="f-20">Your download will begin in a moment.</div>
               <div class="">
                    <div class="container-fluid card" id="receipt">
                        <div class="row">
                            <div class="col-xs-2 col-xs-offset-3">
                                <img src="img/logo_hc.png" style="width: 60px;height: 60px;">
                            </div>
                            <div class="col-xs-5">
                                <div class="f-30">Landslide&trade;</div>
                                <div class="f-14">Avalanche&trade; Corporation</div>
                            </div>
                            <div class="lh-15">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10 col-xs-offset-2">
                                <div class="f-20">Sold to <?php echo $user->name ?></div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-2">
                                <div class="f-20">On <?php echo $transactions[0]->timestamp ?></div>
                            </div>
                            <div class="lh-15">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-xs-offset-2">
                                <div class="f-17">Item</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="f-17">Price</div>
                            </div>
                            <?php
                                $total = 0;
                                foreach ($transactions as $trans) {
                                    $total += $trans->price
                            ?>
                            <div class="col-xs-6 col-xs-offset-2">
                                <div class="f-15">&emsp;<?php echo $trans->prod_name ?></div>
                            </div>
                            <div class="col-xs-4">
                                <div class="f-15">&emsp;<img src="img/Avacoin.svg" style="width:15px; height:15px;" > <?php echo $trans->price ?></div>
                            </div>
                            <br/>
                            <?php
                                }
                            ?>
                            <div class="col-xs-6 col-xs-offset-2">
                                <div class="f-25"><strong>TOTAL</strong></div>
                            </div>
                            <div class="col-xs-4">
                                <div class="f-25"><img src="img/avacoins.png" style="width:25px; height:25px;" > <?php echo $total ?></div>
                            </div>
                            <div class="lh-15">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="f-12 text-muted">System generated receipt</div>
                            </div>
                        </div>
                    </div>
                    <div class="lh-15">&nbsp;</div>
                    <div class="form-group" align="right">
                        <button onclick="downloadZips()" class="btn-link">Click here if the download had not started...</button>
                        <button id="btn-create" class="btn-landslide-approve">Save Receipt as PDF</button>
                    </div>
               </div>
            </div>
          </div>

              

        <div class="lh-75">&nbsp;</div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="vendors/html2canvas/html2canvas.min.js"></script>
        <script type="text/javascript" src="vendors/jsPdf/jspdf.debug.js"></script>
        <script type="text/javascript" src="js/main.min.js"></script>
        <script type="text/javascript" src="js/checkout-landing.min.js"></script>

    </body>
</html>