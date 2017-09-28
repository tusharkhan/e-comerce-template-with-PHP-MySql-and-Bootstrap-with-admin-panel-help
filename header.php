<?php
/**
 * Header File of Template
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/8/2017
 * Time: 6:11 AM
 */
?>
<?php
    $filePath = realpath(dirname(__FILE__));
    include 'lib/Session.php';
    Session::init();
?>
<?php
    include "lib/Database.php";
    include 'helpers/Formate.php';

    spl_autoload_register(function ($classes){ include_once 'classes/'.$classes.'.php';});
    $databaseObject     = new Database();
    $productObject      = new Product();
    $categoryObject     = new Category();
    $userObject         = new User();
    $cartObject         = new Cart();
    $formateObject      = new Formate();
    $allCategoryObject  = new AllCategory();
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
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //Custom Theme files -->


        <!-- font-awesome icons -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- //font-awesome icons -->


        <!-- js -->
        <script src="js/jquery.min.js"></script>
        <link rel="stylesheet" href="css/jquery.countdown.css" /> <!-- countdown -->
        <!-- //js -->


        <!-- web fonts -->
        <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- //web fonts -->


        <!-- start-smooth-scrolling -->
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
        </script>
        <style>
            .fa-facebook-f:before, .fa-facebook:before {
                content: "\f09a";
                position: relative;
                left: 0px;
            }

            .agileits_social_button ul li a.fa-facebook:hover {
                background-color: #3c43a4;
                display: block;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                -ms-border-radius: 50%;
                -o-border-radius: 50%;
                border-radius: 50%;
                padding: 10px;
                /* padding-left: 10px; */
                /* padding-right: 10px; */
                margin: 10px;
            }
        </style>
        <!-- //end-smooth-scrolling -->
    </head>

    <body>
        <!-- for bootstrap working -->
        <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
        <!-- //for bootstrap working -->
        <!-- header modal -->
        <?php if (!(Session::get("userLogin"))): ?>
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
                                <div class="col-md-12 modal_body_left modal_body_left1">
                                    <div class="sap_tabs">
                                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                            <ul>
                                                <li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
                                                <li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
                                            </ul>
                                            <?php if ( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['singin']) ): ?>
                                                <?php $userObject->loginUser($_POST['email'], $_POST['pass']); ?>
                                            <?php endif; ?>
                                            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                                <div class="facts">
                                                    <div class="register">
                                                        <form action="#" method="POST">
                                                            <input name="email" placeholder="Email Address" type="text" >
                                                            <input name="pass" placeholder="Password" type="password" >
                                                            <div class="sign-up">
                                                                <input type="submit" name="singin" value="Sign in"/>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['create']) ): ?>
                                                <?php $userObject->registerUser($_POST['Name'], $_POST['Email'], $_POST['Phone'], $_POST['Password'], $_POST['rePassword']); ?>
                                            <?php endif; ?>
                                            <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                                                <div class="facts">
                                                    <div class="register">
                                                        <form action="#" method="POST">
                                                            <input placeholder="Name" name="Name" type="text" >
                                                            <input placeholder="Email Address" name="Email" type="email"  />
                                                            <input placeholder="Phone Number" name="Phone" type="text" style="margin-top: 15px" />
                                                            <input placeholder="Password" name="Password" type="password"  />
                                                            <input placeholder="Confirm Password" name="rePassword" type="password"  />
                                                            <div class="sign-up">
                                                                <input type="submit" name="create" value="Create Account" />
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
            <script>
                $('#myModal88').modal('show');
            </script>
        <?php endif; ?>
        <!-- header modal -->
        <!-- header -->
        <div class="header" id="home1">
            <div class="container">
                <?php if (!(Session::get("userLogin"))): ?>
                <div class="w3l_login">
                    <a href="#" data-toggle="modal" data-target="#myModal88">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="w3l_logo">
                    <h1><a href="index.php"><?php echo $allCategoryObject->websiteName; ?><span><?php echo $allCategoryObject->title; ?></span></a></h1>
                </div>
                <div class="search">
                    <input class="search_box" type="checkbox" id="search_box">
                    <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                    <?php if ( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['search']) ):  ?>
                        <?php
                            $id = $productObject->searchProduct($_POST['Search']);
                            if ($id)
                            {
                                while ($pri = $id->fetch_assoc()) {
                                    echo "<script>window.location = 'single.php?proid="; echo $pri['proid']; echo "'</script>";
                                }
                            }
                        ?>
                    <?php endif;  ?>
                    <div class="search_form">
                        <form action="#" method="post">
                            <input type="text" name="Search" placeholder="Search Product..." />
                            <input type="submit" value="Send" name="search" />
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
                            <li><a href="index.php" class="act">Home</a></li>
                            <!-- Mega Menu -->
                            <li>
                                <a href="products.php" >Products</a>
                            </li>
                            <li><a href="about.php">About Us</a></li>
                            <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (Session::get("userLogin")): ?>
                                        <li><a href="cart.php">My Cart</a></li>
                                    <?php endif; ?>
                                    <li><a href="mail.php">Mail Us</a></li>
                                </ul>
                            </li>
                            <?php if (Session::get("userLogin")): ?>
                                <li><a href="profile.php">Profile</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>