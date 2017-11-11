  <!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
        <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <?php 
    session_start();

    require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php'; 
    require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objUser.php'; 
    require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objDeveloper.php'; 
    

    if (!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false) header("Location: /landslide/");

    ?>
    <?php include 'navbar.php'; ?>
    <div class="lh-75">&nbsp;</div>
    <body class="bg-gray2">
       <div class="f-45 container">Administrator Page</div>
       <div class="lh-50">&nbsp;</div>
        <div class="row">
           <div class="container"><!--Buton Menu for admin-->
               <div class="tabmenu" data-toggle="buttons-radio">
                   <a href="#pending" class="btn btn-lg active2" data-toggle="tab">Pending Approval</a>
                   <a href="#list-apps" class="btn btn-lg active2" data-toggle="tab">List of Apps</a>
                   <a href="#list-users" class="btn btn-lg active3" data-toggle="tab">List of Users</a>
               </div>
            </div><!-- End Buton Menu for admin-->
            <div class="tab-content"><!--Tab content for first content-->
                <div class="tab-pane active" id="pending">
                    <div class="bg-tab">
                        <div class="scrollbar" id="style-1">
                           
                            <div class="force-overflow">
                              <div>

                              <?php 
                
                              $unapproved = Product::getUnaprrovedProducts(0);

                              if (!$unapproved) {
                                  ?>
                                  <div class="lh-100">&nbsp;</div>
                                  <div class="f-30" align="center"><i class="fa fa-exclamation-triangle"></i>&nbsp;No products need approval</div>

                              <?php } else {
                                // Foreach
                                foreach ($unapproved as $product) {

                              ?>

                                   <div class="col-md-4 col-xs-12 product-container">
                                       <div class="lh-50">&nbsp;</div>
                                       <div class="loop-admin">
                                           <div class="admin-box">
                                               <div class="col-md-3 col-xs-1">
                                                   <div class="product-box-sm">
                                                      <img class="product_thumbnail" src="<?php echo $product->icon_location ?>" style="width:100px; height:100px; border-radius:20px;">
                                                   </div>
                                               </div>
                                               <div class="col-md-6 col-xs-2">
                                                   <div class="col-md-10 col-xs-10">
                                                       <label class="f-17"><?php echo $product->shortname ?></label>
                                                       <label class="f-12">Total Downloads: <?php echo $product->downloads ?></label>
                                                      <?php
                                                      // If product is previously denied
                                                        if ($product->approval == 2) {
                                                       ?>
                                                        <label class="text-danger">Denied</label>
                                                      <?php } ?>
                                                   </div>
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-approve" onclick="updateApprovalOfProduct(<?php echo $product->id ?>, this, 1)">Approve</button>
                                                   </div>  
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-deny" onclick="updateApprovalOfProduct(<?php echo $product->id ?>, this, 2)">Deny</button>
                                                   </div>  
                                               </div>
                                               <div class="col-md-2 col-xs-2"></div>
                                           </div>
                                           <div class="lh-15">&nbsp;</div> 
                                       </div>
                                   </div>

                                   <?php } // End of for loop 
                                    } // End of if-else ?>

                               </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Tab content for first content-->

            <div class="tab-content"><!--Tab content for second content-->
                <div class="tab-pane" id="list-apps">

                  <div class="bg-tab">
                    <div class="scrollbar" id="style-1">


                      <div class="lh-50">&nbsp;</div>
                      <div class="col-md-3 col-sm-3 col-xs-3">
                          <form class="navbar-form" role="search" method="get" action="admin.php">
                              <div class="input-group">
                                  <input type="text" class="form-control" name="search" placeholder="Search" />
                                  <div class="input-group-btn">
                                      <button class="btn bg-search btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                                  </div>
                                  <input type="hidden" name="tab" value="list-apps" />
                              </div>
                          </form>
                      </div>

                      <div class="force-overflow">
                        <div>

                          <div class="lh-75">&nbsp;</div>
                          <?php 
                          $search = "ALLPRODUCTS";

                          if (isset($_REQUEST["tab"]) && $_REQUEST["tab"] == "list-apps"
                            && isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
                            $search = $_REQUEST["search"];

                          $allprod = Product::getProducts($search);

                          if (isset($_REQUEST["tab"]) && $_REQUEST["tab"] == "list-apps"
                            && isset($_REQUEST["alpha"]))
                            $allprod = Product::getProductsStartingWith($_REQUEST["alpha"]);

                          if (!$allprod) {
                              ?>
                            <div class="f-30"><i class="fa fa-exclamation-triangle"></i>&nbsp;No products need approval</div>

                         <?php } else {
                            // Foreach
                            foreach ($allprod as $product) {

                          ?>
                          <div class="col-md-4 col-xs-12 product-container">
                            <div class="lh-50">&nbsp;</div>
                            <div class="loop-admin">
                              <div class="admin-box">
                                <div class="col-md-3 col-xs-1">
                                  <div class="product-box-sm">
                                      <img class="product_thumbnail" src="<?php echo $product->icon_location ?>" style="width:100px; height:100px; border-radius:20px;">
                                  </div>
                                </div>
                                <div class="col-md-6 col-xs-2">
                                  <div class="col-md-10 col-xs-10">
                                    <label class="f-17"><?php echo $product->shortname ?></label>
                                    <label class="f-12">Total Downloads: <?php echo $product->downloads ?></label>
                                    <?php
                                    // If product is previously denied
                                      if ($product->approval == 2) {
                                     ?>
                                      <label class="text-danger">Denied</label>
                                    <?php } ?>
                                  </div>
                                  <div class="col-md-6 col-xs-6">
                                    <button class="btn-landslide-deny" onclick="updateApprovalOfProduct(<?php echo $product->id ?>, this, 2)">Deny</button>
                                  </div>  
                                </div>
                                <div class="col-md-2 col-xs-2"></div>
                              </div>
                              <div class="lh-15">&nbsp;</div> 
                            </div>
                          </div>

                         <?php } // End of for loop 
                          } // End of if-else 
                          ?>

                        </div>
                      </div>


                    </div> <!--End scrollbar class -->

                  </div>

                   <div class="bg-tab-letters"><!--Alphabetical Pagination-->
                       <div class="col-md-1"></div>
                       <div class="col-md-9" style="margin-left: 75px;">
                           <div class="btn-toolbar">
                               <div class="btn-group btn-group">
                                   <a class="btn f-17 alpha-link" href="#">A</a>
                                   <a class="btn f-17 alpha-link" href="#">B</a>
                                   <a class="btn f-17 alpha-link" href="#">C</a>
                                   <a class="btn f-17 alpha-link" href="#">D</a>
                                   <a class="btn f-17 alpha-link" href="#">E</a>
                                   <a class="btn f-17 alpha-link" href="#">F</a>
                                   <a class="btn f-17 alpha-link" href="#">G</a>
                                   <a class="btn f-17 alpha-link" href="#">H</a>
                                   <a class="btn f-17 alpha-link" href="#">I</a>
                                   <a class="btn f-17 alpha-link" href="#">J</a>
                                   <a class="btn f-17 alpha-link" href="#">K</a>
                                   <a class="btn f-17 alpha-link" href="#">L</a>
                                   <a class="btn f-17 alpha-link" href="#">M</a>
                                   <a class="btn f-17 alpha-link" href="#">N</a>
                                   <a class="btn f-17 alpha-link" href="#">O</a>
                                   <a class="btn f-17 alpha-link" href="#">P</a>
                                   <a class="btn f-17 alpha-link" href="#">Q</a>
                                   <a class="btn f-17 alpha-link" href="#">R</a>
                                   <a class="btn f-17 alpha-link" href="#">S</a>
                                   <a class="btn f-17 alpha-link" href="#">T</a>
                                   <a class="btn f-17 alpha-link" href="#">U</a>
                                   <a class="btn f-17 alpha-link" href="#">V</a>
                                   <a class="btn f-17 alpha-link" href="#">W</a>
                                   <a class="btn f-17 alpha-link" href="#">X</a>
                                   <a class="btn f-17 alpha-link" href="#">Y</a>
                                   <a class="btn f-17 alpha-link" href="#">Z</a>
                                   <a class="btn f-17 alpha-link" href="#" style="border-right: none;">0-9</a>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-2"></div>
                   </div>
                </div>
            </div><!--End Tab content for second content-->
            <div class="tab-content"><!--Tab content for third content-->
                <div class="tab-pane" id="list-users">

                    <div class="bg-tab-alphabetical">
                        <div class="lh-50">&nbsp;</div>
                        <div class="container">
                            <div class="f-36">Alphabetical</div>
                        </div>
                        <div class="lh-15">&nbsp;</div>
                        <div class="col-md-3 col-sm-5 col-xs-5">
                            <form class="navbar-form" role="search" method="get" action="admin.php">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search">
                                    <input type="hidden" name="tab" value="list-users">
                                    <div class="input-group-btn">
                                        <button class="btn bg-search btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       <div class="scrollbar-earners-alphabet" id="style-1">

                        <div class="force-overflow">

                          <?php 

                          $search = "ALLUSERS";

                          if (isset($_REQUEST["tab"]) && $_REQUEST["tab"] == "list-users"
                            && isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
                            $search = $_REQUEST["search"];


                          $allusr = User::getUsersBySearchTerm($search);

                          if (isset($_REQUEST["tab"]) && $_REQUEST["tab"] == "list-users" &&
                            isset($_REQUEST["alpha"]))
                            $allusr = User::getUsersStartingWith($_REQUEST["alpha"]);

                          if (!$allusr) {

                            echo "<div>No User found</div>";

                          } else {
                            // Foreach
                            foreach ($allusr as $usr) {
                          ?>

                            <div class="col-md-4 col-xs-12 user-container">
                              <div class="lh-15">&nbsp;</div>
                              <div class="loop-admin">
                                <div class="admin-box">
                                  <!-- <div class="col-md-3 col-xs-1">
                                     <div class="product-box-sm">
                                     </div>
                                 </div> -->
                                  <div class="col-md-11 col-xs-11">
                                      <div class="col-md-12 col-xs-12">
                                          <label class="f-25"><?php echo $usr->name ?></label>
                                          <div class="f-12"><?php echo $usr->email ?></div>
                                          <div class="f-12">Joined on <?php echo $usr->timestamp ?></div>
                                      </div>  
                                      <div class="col-md-9 col-xs-9"></div>
                                      <div class="col-md-3 col-xs-3">
                                          <button class="btn-landslide-deny"onclick="deleteUser(<?php echo $usr->id ?>, this)">Delete</button>
                                      </div>  
                                  </div>
                                  <div class="col-md-2 col-xs-2"></div>
                                </div> 
                              </div>
                            </div>

                             <?php
                              } // End foreach
                            } // End if-else
                             ?>

                           </div>
                           <div class="col-md-4 col-sm-12 col-xs-4"></div>
                           <div class="col-md-4 col-sm-12 col-xs-4"></div>
                       </div>
                    </div>

<!--                     <div class="bg-tab-seemore">
                        <div class="col-md-offset-10">
                            <a href="#" class="btn f-24 showLink" style="border-right:none;" id="content-show" onclick="showHide('content');return false;">See more</a>
                        </div>
                    </div> -->


                    <div class="bg-tab-top-earners">
                        <div class="lh-50">&nbsp;</div>
                        <div class="f-36 container">Top Earners</div>
                        <div class="scrollbar-earners" id="style-1">
     
                          <?php 

                          $topusr = Developer::getTopEarners(3);

                          if (!$topusr) {

                            echo "<div>No User found</div>";

                          } else {
                            // Foreach
                            foreach ($topusr as $usr) {

                              if ($usr->total_revenue <= 0) continue;
                          ?>

                            <div class="col-md-4 col-xs-12">
                              <div class="lh-15">&nbsp;</div>
                              <div class="loop-admin">
                                <div class="admin-usr-box">
                                  <!-- <div class="col-md-3 col-xs-1">
                                     <div class="product-box-sm">
                                     </div>
                                 </div> -->
                                  <div class="col-md-11 col-xs-11">
                                      <div class="col-md-12 col-xs-12">
                                          <label class="f-25"><?php echo $usr->name ?></label>
                                          <div class="f-12"><?php echo $usr->email ?></div>
                                          <div class="f-12">Joined on <?php echo $usr->timestamp ?></div>
                                          <div class="f-12">Total Downloads: <?php echo $usr->total_downloads ?>, Total Revenue: <?php echo $usr->total_revenue ?></div>
                                      </div>  
                                      <div class="col-md-9 col-xs-9"></div>
                                     <!--  <div class="col-md-3 col-xs-3">
                                          <button class="btn-landslide-deny">Delete</button>
                                      </div>   -->
                                  </div>
                                  <div class="col-md-2 col-xs-2"></div>
                                </div> 
                              </div>
                            </div>

                             <?php
                              } // End foreach
                            } // End if-else
                             ?>

                          </div>
                      </div>


                    <div class="bg-tab-letters"><!--Alphabetical Pagination-->
                        <div class="col-md-1"></div>
                        <div class="col-md-9" style="margin-left: 75px;">
                            <div class="btn-toolbar">
                               <div class="btn-group btn-group">
                                   <a class="btn f-17 alpha-user-link" href="#">A</a>
                                   <a class="btn f-17 alpha-user-link" href="#">B</a>
                                   <a class="btn f-17 alpha-user-link" href="#">C</a>
                                   <a class="btn f-17 alpha-user-link" href="#">D</a>
                                   <a class="btn f-17 alpha-user-link" href="#">E</a>
                                   <a class="btn f-17 alpha-user-link" href="#">F</a>
                                   <a class="btn f-17 alpha-user-link" href="#">G</a>
                                   <a class="btn f-17 alpha-user-link" href="#">H</a>
                                   <a class="btn f-17 alpha-user-link" href="#">I</a>
                                   <a class="btn f-17 alpha-user-link" href="#">J</a>
                                   <a class="btn f-17 alpha-user-link" href="#">K</a>
                                   <a class="btn f-17 alpha-user-link" href="#">L</a>
                                   <a class="btn f-17 alpha-user-link" href="#">M</a>
                                   <a class="btn f-17 alpha-user-link" href="#">N</a>
                                   <a class="btn f-17 alpha-user-link" href="#">O</a>
                                   <a class="btn f-17 alpha-user-link" href="#">P</a>
                                   <a class="btn f-17 alpha-user-link" href="#">Q</a>
                                   <a class="btn f-17 alpha-user-link" href="#">R</a>
                                   <a class="btn f-17 alpha-user-link" href="#">S</a>
                                   <a class="btn f-17 alpha-user-link" href="#">T</a>
                                   <a class="btn f-17 alpha-user-link" href="#">U</a>
                                   <a class="btn f-17 alpha-user-link" href="#">V</a>
                                   <a class="btn f-17 alpha-user-link" href="#">W</a>
                                   <a class="btn f-17 alpha-user-link" href="#">X</a>
                                   <a class="btn f-17 alpha-user-link" href="#">Y</a>
                                   <a class="btn f-17 alpha-user-link" href="#">Z</a>
                                   <a class="btn f-17 alpha-user-link" href="#" style="border-right: none;">0-9</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                   </div>
                </div>
              </div><!--End Tab content for third content-->

        </div>
        <script type="text/javascript">

            <?php 
            $tab = "";
            $search = "";
            $alpha = "";

            if (isset($_REQUEST["tab"]))
                $tab = $_REQUEST["tab"];

            if (isset($_REQUEST["search"]))
                $search = $_REQUEST["search"];

            if (isset($_REQUEST["alpha"]))
                $alpha = $_REQUEST["alpha"];
            ?>

            var openedTab = "<?php echo $tab ?>";
            var search = "<?php echo $search ?>";
            var alpha = "<?php echo $alpha ?>";
        </script>
        <div class="lh-100">&nbsp;</div>
        <?php include 'footer.php';?>
        <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
    </body>              
</html>