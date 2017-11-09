<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Landslide</title>
        <link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
        <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <?php 
      require_once "php/objects/objCart.php";
      require_once "php/objects/objUser.php";
      include 'navbar.php'; 

    ?>
    <body class="bg-gray2">
        <div class="container">
            <div class="lh-100">&nbsp;</div>
               <div class="col-md-3"></div>
               <div class="col-md-6">
                   <div class="f-45" align="center"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Account Settings</div>
                   <div class="lh-75">&nbsp;</div>
                   <form method="post" action="">
                       <!-- Email -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="email" >Email:</label></div>
                           <div class="f-17">
                               <input type="email" class="form-control" id="email" name="email"/>
                           </div>
                       </div>
                       <!-- Password-->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="password" >Password:</label></div>
                           <div class="f-17">
                               <input type="password" class="form-control" id="password" name="password"/>
                           </div>
                       </div>
                       <!-- Fname -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="fname" >First Name:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control" id="fname" name="fname"/>
                           </div>
                       </div>
                       <!-- Lname -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="lname" >Last Name:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control" id="lname" name="lname"/>
                           </div>
                       </div>
                       <!--Upgrade to developer-->
                       <div class="form-group"><!--TODO JQuery to hide and show or change the contents-->
                          <div class="col-md-2">
                              <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                              </label>
                          </div>
                           <div class="col-md-10">
                               <label class="f-24">Upgrade to Developer</label>
                           </div>
                       </div>
                       <div class="lh-15">&nbsp;</div>
                       <!-- Dev Name -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="" >Developer Name:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control" id="" name=""/>
                           </div>
                       </div>
                       <!-- Dev Description -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="" >Developer Description:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control" id="" name=""/>
                           </div>
                       </div>
                       <!-- Add Avacoin -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="" ><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Avacoin</label></div>
                           <div class="">
                               <input type="number" class="form-control" id="" name=""/>
                           </div>
                       </div>
                       <!--Transaction History-->
                       <label class="f-17" for="">Transaction History</label>
                       <div class="scrollbar-transaction" id="style-1">
                           <table class="table table-hover">
                               <thead class="f-17">
                                   <tr>
                                       <th>Product Name</th>
                                       <th>Price</th>
                                       <th>Date</th>
                                   </tr>
                               </thead>
                               <tbody class="f-12">
                                   <tr>
                                       <td>Product 2</td>
                                       <td>A$230</td>
                                       <td>11-09-17</td>
                                   </tr>
                                   <tr>
                                       <td>Product 2</td>
                                       <td>A$230</td>
                                       <td>11-09-17</td>
                                   </tr>
                                   <tr>
                                       <td>Product 2</td>
                                       <td>A$230</td>
                                       <td>11-09-17</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </form>   
               </div>
                <div class="col-md-3"></div>	
            </div>
        </div>
    <div class="lh-75">&nbsp;</div>
        <?php include 'footer.php';?>
        <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendors/bootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>