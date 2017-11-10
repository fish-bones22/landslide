<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Landslide</title>
        <link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
        <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
      session_start();

      include 'php/helper-functions/authenticate.php';
      require_once "php/objects/objCart.php";
      require_once "php/objects/objUser.php";
      require_once "php/objects/objDeveloper.php";
      include 'navbar.php'; 

      $user = User::getUserById($_SESSION["userid"]);
      $dev = Developer::getDeveloperById($_SESSION["userid"]);

    ?>
    <body class="bg-gray2">
        <div class="container">
            <div class="lh-100">&nbsp;</div>
               <div class="col-md-3"></div>
               <div class="col-md-6">
                   <div class="f-45" align="center"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Account Settings</div>
                   <div class="lh-75">&nbsp;</div>
                   <?php
                   if (isset($_REQUEST["suc"])) {
                   ?>
                   <div class="alert alert-success alert-dismissable fade in">Changes Saved<button class="close" data-dismiss="alert" aria-label="close">&times;</button></div>
                   <?php 
                    }
                   ?>
                   <?php
                   if (isset($_REQUEST["err"])) {
                   ?>
                   <div class="alert alert-danger alert-dismissable fade in">Update Failed<button class="close" data-dismiss="alert" aria-label="close">&times;</button></div>
                   <?php 
                    }
                   ?>
                   <form method="post" action="php/helper-functions/updateaccount.php">
                       <!-- Email -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="email" >Email:</label></div>
                           <div class="f-17">
                               <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email ?>" />
                           </div>
                       </div>
                       <!-- Password-->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="password" >Password:</label></div>
                           <div class="f-17">
                               <input type="password" class="form-control" id="password" name="password" value="<?php echo $user->password ?>" />
                           </div>
                       </div>
                       <!-- Fname -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="fname" >First Name:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user->fname ?>"/>
                           </div>
                       </div>
                       <!-- Lname -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="lname" >Last Name:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user->lname ?>"/>
                           </div>
                       </div>
                       <!-- Gender -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="lname" >Sex:</label></div>
                           <div class="f-17">
                               <select class="form-control" id="sex" name="sex" value="<?php echo $user->sex ?>" required>
                                <option value="1">Boeing AH-64 Apache Helicopter</option>
                                <option value="2">Others</option>
                               </select>
                           </div>
                       </div>
                       <!--Upgrade to developer-->
                       <div class="form-group"><!--TODO JQuery to hide and show or change the contents-->
                          <div class="col-md-2">
                              <label class="switch">
                                  <input id="dev-toggle" type="checkbox" <?php if ($user->type == 2) echo "checked" ?> name="dev_toggle">
                                  <span class="slider round"></span>
                              </label>
                          </div>
                           <div class="col-md-10">
                               <label class="f-24 dev-title">Upgrade to Developer</label>
                           </div>
                       </div>
                       <div class="lh-15">&nbsp;</div>
                       <!-- Dev Name -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="" >Developer Name:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control dev-inp" id="" name="dev_name" value="<?php if ($user->type == 2) echo "$dev->dev_name" ?>"/>
                           </div>
                       </div>
                       <!-- Dev Description -->
                       <div class="form-group">
                           <div class="f-17"><label class="" for="" >Developer Description:</label></div>
                           <div class="f-17">
                               <input type="text" class="form-control dev-inp" id="" name="dev_desc" value="<?php if ($user->type == 2) echo "$dev->dev_description" ?>" />
                           </div>
                       </div>
                       
                       <div class="col-md-12" align="right">
                           <button class="btn-landslide-approve" type="submit" href="#">Save</button>
                       </div>

                       <div class="lh-50">&nbsp;</div>
                       <!-- Add Avacoin -->
                       <div class="form-group" id="topup">
                           <div class="f-17"><label class="" for="" ><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Avacoin</label></div>
                           <div class="form-inline">
                              <input type="number" class="form-control" id="" name="" />
                              <button class="btn-landslide-approve">Add</button>
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

                                <?php 

                                  if (!$user->transactions || count($user->transactions) <= 0) {
                                    echo "<tr><td colspan=3>$user->transactions  No transactions</td></tr>";
                                  } else {

                                    foreach ($user->transactions as $trans) {

                                ?>
                                   <tr>
                                       <td><?php echo $trans->prod_name ?></td>
                                       <td>A$<?php echo $trans->price ?></td>
                                       <td><?php echo $trans->timestamp ?></td>
                                   </tr>

                                   <?php 
                                    }
                                  }
                                  ?>
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
        <script type="text/javascript" src="js/accountsettings.js"></script>
    </body>
    </body>
</html>