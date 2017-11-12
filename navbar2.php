
<html>
  <head>
    <title>navbar example</title>
    <link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css">
    <link href="vendors/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <nav class="navbar bg-black" style="margin-top: 60px;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header navbar-inverse">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <a class="navbar-brand logo-position" href="/landslide/"><img src="img/logo.png" style="width: 140px; height: 140px;"/></a>
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
              <li class="col-md-4 f-18"><a class="bg-nav" href="/landslide/">Home</a></li>
              <li class="col-md-4 f-18"><a class="bg-nav" href="about.php">About</a></li>
              <li class="col-md-4 f-18"><a class="bg-nav" href="about.php#contact">Contacts</a></li>
            </ul>
            <div class="col-md-3 search-position collapse nav navbar-nav nav-collapse" id="nav-collapse2">
              <form class="navbar-form navbar-left" role="search" method="get" action="product-drawer.php">
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn bg-gray btn-rad" type="submit"><i class="fa fa-search" style="font-size: 0.9em;"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a class="col-md-3 col-xs-3 bg-nav" data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse3" style="line-height:5px;"><i class="fa fa-search" style="font-size: 1.5em;">&nbsp;Search</i></a>
              </li>
              <li class="popover-cart cart-position" >
                <input type="hidden" id="cart-val" value="Sample">
                <button type="button"
                        class="btn-cart"  
                        data-toggle="popover-cart" 
                        onclick="goToCheckout()"
                        title=" Number of Items: Sample" 
                        data-content="Total: Sample">
                  <i  class="fa fa-shopping-cart" aria-hidden="true" style="font-size:2.0em;"><span class="badge">0</span></i>
                </button>
              </li>
              <li class="dropdown"><a class="dropdown-toggle bg-black f-18" data-toggle="dropdown"><i class="fa fa-user-circle-o icon-x3" aria-hidden="true" style="font-size: 1.2em;"></i>&nbsp;Sample</a>
                <ul class="dropdown-menu" style="background-color: #252525 !important;">
                  <li><a class="f-18" href="accountsettings.php#topup">
                    <span>
                      <img src="img/Avacoin.svg" style="width:20px; height:20px;">&nbsp;213
                    </span>
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li><a href="accountsettings.php" class="f-18" alt="top-up"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Settings</a></li>
                  <li class="divider"></li>
                  <li><a href="/landslide/login.php" class="f-18"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Log out</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </div><!-- /.container-fluid -->
    </nav>
    </div>
  <script type="text/javascript" src="vendors/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="vendors/bootstrap3/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>

