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
           <div class="container">
               <div class="tabmenu" data-toggle="buttons-radio">
                   <a href="#pending" class="btn btn-lg active" data-toggle="tab">Pending Approval</a>
                   <a href="#features2" class="btn btn-lg active2" data-toggle="tab">List of Apps</a>
                   <a href="#requests2" class="btn btn-lg active3" data-toggle="tab">List of Users</a>
               </div>
           </div>
            <div class="tab-content">
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
            </div>
            <div class="tab-content">
                <div class="tab-pane" id="features2">
                <p class="f-45">HEllo World</p>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane" id="requests2">
                <p class="f-45">Hello World</p>
                </div>
            </div>
        </div>
        <div class="lh-100">&nbsp;</div>
    </body>              
    <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</html>