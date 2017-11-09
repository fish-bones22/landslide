  <!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <?php 

    require_once $_SERVER["DOCUMENT_ROOT"].'/landslide/php/objects/objProduct.php'; 
    
    // Temporary.
    session_start();
    $_SESSION["userid"] = 1;
    $_SESSION["isadmin"] = true;

    if (!isset($_SESSION["isadmin"]) || $_SESSION["isadmin"] == false) header("Location: index.php");

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

                                echo "<div>No products need approval</div>";

                              } else {
                                // Foreach
                                foreach ($unapproved as $product) {

                              ?>

                                   <div class="col-md-4 col-xs-12 product-container">
                                       <div class="lh-50">&nbsp;</div>
                                       <div class="loop-admin">
                                           <div class="admin-box">
                                               <div class="col-md-3 col-xs-1">
                                                   <div class="product-box-sm">
                                                      <img class="product_thumbnail" src="<?php echo $product->icon_location ?>">
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
                                  <div class="input-group-btn">
                                      <button class="btn bg-search btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                                  </div>
                                  <input type="hidden" name="tab" value="list-apps" />
                                  <input type="text" class="form-control" name="search" placeholder="Search" />
                              </div>
                          </form>
                      </div>

                      <div class="force-overflow">
                        <div>

                          <div class="lh-75">&nbsp;</div>
                          <?php 
                          $search = "ALLPRODUCTS";

                          if (isset($_REQUEST["search"]))
                            $search = $_REQUEST["search"];

                          if (isset($_REQUEST["alpha"]))
                            $search = "Alpha-".$_REQUEST["alpha"];

                          $allprod = Product::getProducts($search);
                          if (!$allprod) {

                            echo "<div>No products need approval</div>";

                          } else {
                            // Foreach
                            foreach ($allprod as $product) {

                          ?>
                          <div class="col-md-4 col-xs-12 product-container">
                            <div class="lh-50">&nbsp;</div>
                            <div class="loop-admin">
                              <div class="admin-box">
                                <div class="col-md-3 col-xs-1">
                                  <div class="product-box-sm">
                                    <img class="product_thumbnail" src="<?php echo $product->icon_location ?>">
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
                    <div class="bg-tab-top-earners">
                        <div class="lh-50">&nbsp;</div>
                        <div class="f-36 container">Top Earners</div>
                        <div class="scrollbar-earners" id="style-1">
                            <div class="col-md-4 col-xs-12">
                                <div class="loop-admin">
                                    <div class="admin-box">
                                        <div class="col-md-3 col-xs-1">
                                            <div class="product-box-sm">
                                                <p class="f-17">Insert photo</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-2">
                                            <div class="col-md-12 col-xs-12">
                                                <label class="f-25">Lorem Ipsum</label>
                                                <div class="f-12">Total Downloads:</div>
                                                <div class="f-12">Total Revenue:</div>
                                            </div>  
                                            <div class="col-md-9 col-xs-9"></div>
                                            <div class="col-md-3 col-xs-3">
                                                <button class="btn-landslide-deny">Delete</button>
                                            </div>  
                                        </div>
                                        <div class="col-md-2 col-xs-2"></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="loop-admin">
                                    <div class="admin-box">
                                        <div class="col-md-3 col-xs-1">
                                            <div class="product-box-sm">
                                                <p class="f-17">Insert photo</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-2">
                                            <div class="col-md-12 col-xs-12">
                                                <label class="f-25">Lorem Ipsum</label>
                                                <div class="f-12">Total Downloads:</div>
                                                <div class="f-12">Total Revenue:</div>
                                            </div>  
                                            <div class="col-md-9 col-xs-9"></div>
                                            <div class="col-md-3 col-xs-3">
                                                <button class="btn-landslide-deny">Delete</button>
                                            </div>  
                                        </div>
                                        <div class="col-md-2 col-xs-2"></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                               <div class="loop-admin">
                                   <div class="more" id="content">
                                       <div class="admin-box">
                                           <div class="col-md-3 col-xs-1">
                                               <div class="product-box-sm">
                                                   <p class="f-17">Insert photo</p>
                                               </div>
                                           </div>
                                           <div class="col-md-6 col-xs-2">
                                               <div class="col-md-12 col-xs-12">
                                                   <label class="f-25">Lorem Ipsum</label>
                                                   <div class="f-12">Total Downloads:</div>
                                                   <div class="f-12">Total Revenue:</div>
                                               </div>  
                                               <div class="col-md-9 col-xs-9"></div>
                                               <div class="col-md-3 col-xs-3">
                                                   <button class="btn-landslide-deny">Delete</button>
                                               </div>  
                                           </div>
                                           <div class="col-md-2 col-xs-2"></div>
                                       </div> 
                                   </div>    
                               </div>
                               <div class="top-15">
                                   <div class="read-more-content">
                                       <div class="loop-admin">
                                           <div class="admin-box">
                                               <div class="col-md-3 col-xs-1">
                                                   <div class="product-box-sm">
                                                       <p class="f-17">Insert photo</p>
                                                   </div>
                                               </div>
                                               <div class="col-md-6 col-xs-2">
                                                   <div class="col-md-12 col-xs-12">
                                                       <label class="f-25">Lorem Ipsum</label>
                                                       <div class="f-12">Total Downloads:</div>
                                                       <div class="f-12">Total Revenue:</div>
                                                   </div>  
                                                   <div class="col-md-9 col-xs-9"></div>
                                                   <div class="col-md-3 col-xs-3">
                                                       <button class="btn-landslide-deny">Delete</button>
                                                   </div>  
                                               </div>
                                               <div class="col-md-2 col-xs-2"></div>
                                           </div> 
                                       </div>
                                   </div>
                               </div>
                          </div>
                      </div>
                  </div>
                    <div class="bg-tab-seemore">
                        <div class="col-md-offset-10">
                            <a href="#" class="btn f-24 showLink" style="border-right:none;" id="content-show" onclick="showHide('content');return false;">See more</a>
                        </div>
                    </div>
                    <div class="bg-tab-alphabetical">
                        <div class="lh-50">&nbsp;</div>
                        <div class="container">
                            <div class="f-36">Alphabetical</div>
                        </div>
                        <div class="lh-15">&nbsp;</div>
                        <div class="col-md-3 col-sm-5 col-xs-5">
                            <form class="navbar-form" role="search" method="get" action="product-drawer.php">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn bg-search btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                                    </div>
                                    <input type="text" class="form-control" name="search" placeholder="Search">
                                </div>
                            </form>
                        </div>
                       <div class="scrollbar-earners-alphabet" id="style-1">
                           <div class="lh-50">&nbsp;</div>
                           <div class="col-md-4 col-xs-12">
                               <div class="loop-admin">
                                   <div class="admin-box">
                                       <div class="col-md-3 col-xs-1">
                                           <div class="product-box-sm">
                                               <p class="f-17">Insert photo</p>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-xs-2">
                                           <div class="col-md-12 col-xs-12">
                                               <label class="f-25">Lorem Ipsum</label>
                                               <div class="f-12">Total Downloads:</div>
                                               <div class="f-12">Total Revenue:</div>
                                           </div>  
                                           <div class="col-md-9 col-xs-9"></div>
                                           <div class="col-md-3 col-xs-3">
                                               <button class="btn-landslide-deny">Delete</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div> 
                               </div>
                               <div class="lh-15">&nbsp;</div>
                               <div class="loop-admin">
                                   <div class="admin-box">
                                       <div class="col-md-3 col-xs-1">
                                           <div class="product-box-sm">
                                               <p class="f-17">Insert photo</p>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-xs-2">
                                           <div class="col-md-12 col-xs-12">
                                               <label class="f-25">Lorem Ipsum</label>
                                               <div class="f-12">Total Downloads:</div>
                                               <div class="f-12">Total Revenue:</div>
                                           </div>  
                                           <div class="col-md-9 col-xs-9"></div>
                                           <div class="col-md-3 col-xs-3">
                                               <button class="btn-landslide-deny">Delete</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div> 
                               </div>
                               <div class="lh-15">&nbsp;</div>
                               <div class="loop-admin">
                                   <div class="admin-box">
                                       <div class="col-md-3 col-xs-1">
                                           <div class="product-box-sm">
                                               <p class="f-17">Insert photo</p>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-xs-2">
                                           <div class="col-md-12 col-xs-12">
                                               <label class="f-25">Lorem Ipsum</label>
                                               <div class="f-12">Total Downloads:</div>
                                               <div class="f-12">Total Revenue:</div>
                                           </div>  
                                           <div class="col-md-9 col-xs-9"></div>
                                           <div class="col-md-3 col-xs-3">
                                               <button class="btn-landslide-deny">Delete</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div> 
                               </div>
                           </div>
                           <div class="col-md-4 col-sm-12 col-xs-4"></div>
                           <div class="col-md-4 col-sm-12 col-xs-4"></div>
                       </div>
                    </div>
                    <div class="bg-tab-letters"><!--Alphabetical Pagination-->
                        <div class="col-md-1"></div>
                        <div class="col-md-9" style="margin-left: 75px;">
                            <div class="btn-toolbar">
                                <div class="btn-group btn-group">
                                    <a class="btn f-17" href="#">A</a>
                                    <a class="btn f-17" href="#">B</a>
                                    <a class="btn f-17" href="#">C</a>
                                    <a class="btn f-17" href="#">D</a>
                                    <a class="btn f-17" href="#">E</a>
                                    <a class="btn f-17" href="#">F</a>
                                    <a class="btn f-17" href="#">G</a>
                                    <a class="btn f-17" href="#">H</a>
                                    <a class="btn f-17" href="#">I</a>
                                    <a class="btn f-17" href="#">J</a>
                                    <a class="btn f-17" href="#">K</a>
                                    <a class="btn f-17" href="#">L</a>
                                    <a class="btn f-17" href="#">M</a>
                                    <a class="btn f-17" href="#">N</a>
                                    <a class="btn f-17" href="#">O</a>
                                    <a class="btn f-17" href="#">P</a>
                                    <a class="btn f-17" href="#">Q</a>
                                    <a class="btn f-17" href="#">R</a>
                                    <a class="btn f-17" href="#">S</a>
                                    <a class="btn f-17" href="#">T</a>
                                    <a class="btn f-17" href="#">U</a>
                                    <a class="btn f-17" href="#">V</a>
                                    <a class="btn f-17" href="#">W</a>
                                    <a class="btn f-17" href="#">X</a>
                                    <a class="btn f-17" href="#">Y</a>
                                    <a class="btn f-17" href="#">Z</a>
                                    <a class="btn f-17" href="#" style="border-right: none;">0-9</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
               </div>
            </div><!--End Tab content for third content-->

        </div>
        <div class="lh-100">&nbsp;</div>
    </body>              
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
    <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/admin.js"></script>

</html>