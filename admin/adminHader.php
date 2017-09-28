<?php
/**
 * Admin Header
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/9/2017
 * Time: 4:08 AM
 */
?>
<?php
    include '../lib/Session.php';
    Session::checkAdminSession();
    include '../classes/Message.php';
    include '../classes/Product.php';
    include '../classes/Cart.php';
    include '../classes/User.php';
    include_once '../helpers/Formate.php';
    $messageobject = new Message();
    $productObject = new Product();
    $cartObject    = new Cart();
    $userObject    = new User();
    $formateObject = new Formate();
?>
<!DOCTYPE html>
<html lang="<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> <?php echo $formateObject->title(); ?> </title>

        <!-- Bootstrap -->
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel !</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo Session::get("adminImage"); ?>" alt="<?php echo Session::get("adminFname"); ?>" title="<?php echo Session::get("adminFname"); ?>" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo Session::get("adminFname"); ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="orderDetails.php"> <i class="fa fa-flag"></i> Customer Order</a></li>
<!--                                <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>-->
<!--                                    <ul class="nav child_menu">-->
<!--                                        <li><a href="form.php">General Form</a></li>-->
<!--                                        <li><a href="form_advanced.php">Advanced Components</a></li>-->
<!--                                        <li><a href="form_validation.php">Form Validation</a></li>-->
<!--                                        <li><a href="form_wizards.php">Form Wizard</a></li>-->
<!--                                        <li><a href="form_upload.php">Form Upload</a></li>-->
<!--                                        <li><a href="form_buttons.php">Form Buttons</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
                                <li><a href="addCat.php"><i class="fa fa-archive"></i> Add Category</a></li>
                                <li><a href="addBrand.php"><i class="fa fa-bank"></i> Add Brand</a></li>
                                <li><a href="addProduct.php"><i class="fa fa-database"></i> Add Product </a></li>
                                <li><a href="inbox.php"> <i class="fa fa-inbox"></i> Inbox</a></li>

                                <li><a href="website.php"> <i class="fa fa-credit-card"></i> Website Information </a></li>
                            </ul>
                        </div>
<!--                        <div class="menu_section">-->
<!--                            <h3>Live On</h3>-->
<!--                            <ul class="nav side-menu">-->
<!--                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>-->
<!--                                    <ul class="nav child_menu">-->
<!--                                        <li><a href="e_commerce.php">E-commerce</a></li>-->
<!--                                        <li><a href="projects.php">Projects</a></li>-->
<!--                                        <li><a href="project_detail.php">Project Detail</a></li>-->
<!--                                        <li><a href="contacts.php">Contacts</a></li>-->
<!--                                        <li><a href="profile.php">Profile</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>-->
<!--                                    <ul class="nav child_menu">-->
<!--                                        <li><a href="page_403.php">403 Error</a></li>-->
<!--                                        <li><a href="page_404.php">404 Error</a></li>-->
<!--                                        <li><a href="page_500.php">500 Error</a></li>-->
<!--                                        <li><a href="plain_page.php">Plain Page</a></li>-->
<!--                                        <li><a href="login.php">Login Page</a></li>-->
<!--                                        <li><a href="pricing_tables.php">Pricing Tables</a></li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>-->
<!--                                    <ul class="nav child_menu">-->
<!--                                        <li><a href="#level1_1">Level One</a>-->
<!--                                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>-->
<!--                                            <ul class="nav child_menu">-->
<!--                                                <li class="sub_menu"><a href="level2.php">Level Two</a>-->
<!--                                                </li>-->
<!--                                                <li><a href="#level2_1">Level Two</a>-->
<!--                                                </li>-->
<!--                                                <li><a href="#level2_2">Level Two</a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                        <li><a href="#level1_2">Level One</a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->
<!--                                <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <?php
                            if (isset($_GET['action']) &&  $_GET['action'] == 'adminLogout')
                            {
                                session_destroy();
                                echo "<script>window.location = 'index.php';</script>";
                            }
                        ?>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="?action=adminLogout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo Session::get("adminImage"); ?>" alt="<?php echo Session::get("adminFname"); ?>" title="<?php echo Session::get("adminFname"); ?>" />
                                    <?php echo Session::get("adminFname"); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <?php
                                        if (isset($_GET['action']) &&  $_GET['action'] == 'adminLogout')
                                        {
                                            session_destroy();
                                            echo "<script>window.location = 'index.php';</script>";
                                        }
                                    ?>
                                    <li><a href="?action=adminLogout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <!--=================-->
                            <li role="presentation" class="dropdown">
                                <a href="inbox.php" class="dropdown-toggle info-number">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green"><?php echo $messageRow = mysqli_num_rows($messageobject->getAllMessage());  ?></span>
                                </a>
                            </li>
                            <!--=================-->
                        </ul>
                    </nav>
                </div>
            </div>