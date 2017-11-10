<!DOCTYPE html>
<html lang="en">

    <head>
        <?php 
        session_start();
        include'navbar.php'; 
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
               <div class="f-45">Checkout Successful</div>
               <div class="-f-14">Info here, Info there.</div>
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