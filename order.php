<?php
/**
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/15/2017
 * Time: 2:17 AM
 */
?>
<?php
include 'lib/Session.php';
Session::init();
?>
<?php
include "lib/Database.php";
include 'helpers/Formate.php';

spl_autoload_register(function ($classes){ include_once 'classes/'.$classes.'.php';});
$databaseObject = new Database();
$productObject  = new Product();
$categoryObject = new Cart();
$userObject     = new User();
$formateObject  = new Formate();
$cartObject     = new Cart();
?>
<!DOCTYPE html>
<html lang="<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']?>">
<head>
    <title> <?php echo $formateObject->title(); ?> </title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Tushar Khan" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- //for-mobile-apps -->
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <!-- web fonts -->
    <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- //web fonts -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <!-- start-smooth-scrolling -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <style>
        .star-rating {
            line-height:32px;
            font-size:1.25em;
        }

        .star-rating .fa-star{
            color: yellow;
        }
    </style>
</head>
<body>
<!-- header modal -->
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
            </div>
            <div class="modal-body modal-body-sub">
                <div class="row">
                    <div class="col-md-12 modal_body_left modal_body_left1" >
                        <div class="sap_tabs">
                            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                <ul>
                                    <li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
                                    <li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
                                </ul>
                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                    <div class="facts">
                                        <div class="register">
                                            <form action="#" method="post">
                                                <input name="Email" placeholder="Email Address" type="text" required="">
                                                <input name="Password" placeholder="Password" type="password" required="">
                                                <div class="sign-up">
                                                    <input type="submit" value="Sign in"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                                    <div class="facts">
                                        <div class="register">
                                            <form action="#" method="post">
                                                <input placeholder="Name" name="Name" type="text" required="">
                                                <input placeholder="Email Address" name="Email" type="email" required="">
                                                <input placeholder="Password" name="Password" type="password" required="">
                                                <input placeholder="Confirm Password" name="Password" type="password" required="">
                                                <div class="sign-up">
                                                    <input type="submit" value="Create Account"/>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#horizontalTab').easyResponsiveTabs({
                                    type: 'default', //Types: default, vertical, accordion
                                    width: 'auto', //auto or any width like 600px
                                    fit: true   // 100% fit in a container
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header modal -->
<!-- header -->
<div class="header" id="home1">
    <div class="container">
        <div class="w3l_logo">
            <h1><a href="index.php">Electronic Store<span>Your stores. Your place.</span></a></h1>
        </div>
        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
                <form action="#" method="post">
                    <input type="text" name="Search" placeholder="Search...">
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <ul class="multi-column-dropdown">
                                        <h6>Mobiles</h6>
                                        <li><a href="products.php">Mobile Phones</a></li>
                                        <li><a href="products.php">Mp3 Players <span>New</span></a></li>
                                        <li><a href="products.php">Popular Models</a></li>
                                        <li><a href="products.php">All Tablets<span>New</span></a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-3">
                                    <ul class="multi-column-dropdown">
                                        <h6>Accessories</h6>
                                        <li><a href="products1.php">Laptop</a></li>
                                        <li><a href="products1.php">Desktop</a></li>
                                        <li><a href="products1.php">Wearables <span>New</span></a></li>
                                        <li><a href="products1.php"><i>Summer Store</i></a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-2">
                                    <ul class="multi-column-dropdown">
                                        <h6>Home</h6>
                                        <li><a href="products2.php">Tv</a></li>
                                        <li><a href="products2.php">Camera</a></li>
                                        <li><a href="products2.php">AC</a></li>
                                        <li><a href="products2.php">Grinders</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <div class="w3ls_products_pos">
                                        <h4>30%<i>Off/-</i></h4>
                                        <img src="images/1.jpg" alt=" " class="img-responsive" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </ul>
                    </li>
                    <li><a href="about.php">About Us</a></li>
                    <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="icons.php">Web Icons</a></li>
                            <li><a href="codes.php">Short Codes</a></li>
                        </ul>
                    </li>
                    <li><a href="mail.php">Mail Us</a></li>
                    <?php
                    if (isset($_GET['action']) &&  $_GET['action'] == 'logoutCustomer')
                        {
                            $cartObject->deleteCart();
                            session_destroy();
                            echo "<script>window.location = 'index.php';</script>";
                        }
                    ?>
                    <?php if (Session::get("userLogin")): ?>
                        <li><a href="?action=logoutCustomer">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- //navigation -->

<?php
    include 'footer.php';
?>