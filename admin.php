<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <?php include 'navbar.php'; ?>
    <div class="lh-75">&nbsp;</div>
    <body class="bg-gray2">
       <div class="f-45 container">Administrator Page</div>
       <div class="lh-50">&nbsp;</div>
        <div class="row">
           <div class="container"><!--Buton Menu for admin-->
               <div class="tabmenu" data-toggle="buttons-radio">
                   <a href="#pending" class="btn btn-lg active" data-toggle="tab">Pending Approval</a>
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
                                   <div class="col-md-4 col-xs-12">
                                       <div class="lh-50">&nbsp;</div>
                                       <div class="loop-admin">
                                           <div class="admin-box">
                                               <div class="col-md-3 col-xs-1">
                                                   <div class="product-box-sm">
                                                       <p class="f-17">Insert photo</p>
                                                   </div>
                                               </div>
                                               <div class="col-md-6 col-xs-2">
                                                   <div class="col-md-10 col-xs-10">
                                                       <label class="f-17">Lorem Ipsum</label>
                                                       <label class="f-12">Total Downloads:</label>
                                                   </div>
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-approve">Approve</button>
                                                   </div>  
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-deny">Deny</button>
                                                   </div>  
                                               </div>
                                               <div class="col-md-2 col-xs-2"></div>
                                           </div>
                                           <div class="lh-15">&nbsp;</div> 
                                       </div>
                                   </div>
                                   <div class="col-md-4 col-xs-12">
                                       <div class="lh-50">&nbsp;</div>
                                       <div class="loop-admin">
                                           <div class="admin-box">
                                               <div class="col-md-3 col-xs-1">
                                                   <div class="product-box-sm">
                                                       <p class="f-17">Insert photo</p>
                                                   </div>
                                               </div>
                                               <div class="col-md-6 col-xs-2">
                                                   <div class="col-md-10 col-xs-10">
                                                       <label class="f-17">Lorem Ipsum</label>
                                                       <label class="f-12">Total Downloads:</label>
                                                   </div>
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-approve">Approve</button>
                                                   </div>  
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-deny">Deny</button>
                                                   </div>  
                                               </div>
                                               <div class="col-md-2 col-xs-2"></div>
                                           </div>
                                           <div class="lh-15">&nbsp;</div> 
                                       </div>
                                   </div>
                                   <div class="col-md-4 col-xs-12">
                                       <div class="lh-50">&nbsp;</div>
                                       <div class="loop-admin">
                                           <div class="admin-box">
                                               <div class="col-md-3 col-xs-1">
                                                   <div class="product-box-sm">
                                                       <p class="f-17">Insert photo</p>
                                                   </div>
                                               </div>
                                               <div class="col-md-6 col-xs-2">
                                                   <div class="col-md-10 col-xs-10">
                                                       <label class="f-17">Lorem Ipsum</label>
                                                       <label class="f-12">Total Downloads:</label>
                                                   </div>
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-approve">Approve</button>
                                                   </div>  
                                                   <div class="col-md-6 col-xs-6">
                                                       <button class="btn-landslide-deny">Deny</button>
                                                   </div>  
                                               </div>
                                               <div class="col-md-2 col-xs-2"></div>
                                           </div>
                                           <div class="lh-15">&nbsp;</div> 
                                       </div>
                                   </div>
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
                                  <form class="navbar-form" role="search" method="get" action="product-drawer.php">
                                      <div class="input-group">
                                          <div class="input-group-btn">
                                              <button class="btn bg-search btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                                          </div>
                                          <input type="text" class="form-control" name="search" placeholder="Search">
                                      </div>
                                  </form>
                              </div>
                           <div class="lh-75">&nbsp;</div>
                           <div class="col-md-4 col-xs-12">
                               <div class="loop-admin">
                                   <div class="admin-box">
                                       <div class="col-md-3 col-xs-1">
                                           <div class="product-box-sm">
                                               <p class="f-17">Insert photo</p>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-xs-2">
                                           <div class="col-md-10 col-xs-10">
                                               <label class="f-17">Lorem Ipsum</label>
                                               <label class="f-12">Total Downloads:</label>
                                           </div>
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-approve">Approve</button>
                                           </div>  
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-deny">Deny</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div>
                                   <div class="lh-15">&nbsp;</div> 
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
                                           <div class="col-md-10 col-xs-10">
                                               <label class="f-17">Lorem Ipsum</label>
                                               <label class="f-12">Total Downloads:</label>
                                           </div>
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-approve">Approve</button>
                                           </div>  
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-deny">Deny</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div>
                                   <div class="lh-15">&nbsp;</div> 
                               </div>
                               <div class="loop-admin">
                                   <div class="admin-box">
                                       <div class="col-md-3 col-xs-1">
                                           <div class="product-box-sm">
                                               <p class="f-17">Insert photo</p>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-xs-2">
                                           <div class="col-md-10 col-xs-10">
                                               <label class="f-17">Lorem Ipsum</label>
                                               <label class="f-12">Total Downloads:</label>
                                           </div>
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-approve">Approve</button>
                                           </div>  
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-deny">Deny</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div>
                                   <div class="lh-15">&nbsp;</div> 
                               </div>
                               <div class="loop-admin">
                                   <div class="admin-box">
                                       <div class="col-md-3 col-xs-1">
                                           <div class="product-box-sm">
                                               <p class="f-17">Insert photo</p>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-xs-2">
                                           <div class="col-md-10 col-xs-10">
                                               <label class="f-17">Lorem Ipsum</label>
                                               <label class="f-12">Total Downloads:</label>
                                           </div>
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-approve">Approve</button>
                                           </div>  
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-deny">Deny</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div>
                                   <div class="lh-15">&nbsp;</div> 
                               </div>
                               <div class="loop-admin">
                                   <div class="admin-box">
                                       <div class="col-md-3 col-xs-1">
                                           <div class="product-box-sm">
                                               <p class="f-17">Insert photo</p>
                                           </div>
                                       </div>
                                       <div class="col-md-6 col-xs-2">
                                           <div class="col-md-10 col-xs-10">
                                               <label class="f-17">Lorem Ipsum</label>
                                               <label class="f-12">Total Downloads:</label>
                                           </div>
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-approve">Approve</button>
                                           </div>  
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-deny">Deny</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div>
                                   <div class="lh-15">&nbsp;</div> 
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
                                           <div class="col-md-10 col-xs-10">
                                               <label class="f-17">Lorem Ipsum</label>
                                               <label class="f-12">Total Downloads:</label>
                                           </div>
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-approve">Approve</button>
                                           </div>  
                                           <div class="col-md-6 col-xs-6">
                                               <button class="btn-landslide-deny">Deny</button>
                                           </div>  
                                       </div>
                                       <div class="col-md-2 col-xs-2"></div>
                                   </div> 
                               </div>
                           </div>
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
            </div><!--End Tab content for second content-->
            <div class="tab-content"><!--Tab content for third content-->
                <div class="tab-pane" id="list-users">
                <p class="f-45">Hello World</p>
                </div>
            </div><!--End Tab content for third content-->
        </div>
        <div class="lh-100">&nbsp;</div>
    </body>              
    <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</html>