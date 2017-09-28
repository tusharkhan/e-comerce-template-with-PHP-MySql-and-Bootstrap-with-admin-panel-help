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
include 'lib/Session.php';
Session::init();
?>
<?php
include "lib/Database.php";
include 'helpers/Formate.php';

spl_autoload_register(function ($classes){ include_once 'classes/'.$classes.'.php';});
$databaseObject = new Database();
$productObject  = new Product();
$categoryObject = new Category();
$userObject     = new User();
$cartObject     = new Cart();
$messageObject  = new Message();
?>
<?php
$formateObject = new Formate();
?>
<?php
global $cat;
?>
<!DOCTYPE html>
<html lang="<?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']?>">
<head>
    <title> <?php echo $formateObject->title(); ?> </title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Tushar Khan" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<!--<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"-->
<!--     aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">-->
<!--                    &times;</button>-->
<!--                <h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>-->
<!--            </div>-->
<!--            <div class="modal-body modal-body-sub">-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12 modal_body_left modal_body_left1" >-->
<!--                        <div class="sap_tabs">-->
<!--                            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">-->
<!--                                <ul>-->
<!--                                    <li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>-->
<!--                                    <li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>-->
<!--                                </ul>-->
<!--                                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">-->
<!--                                    <div class="facts">-->
<!--                                        <div class="register">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <input name="Email" placeholder="Email Address" type="text" required="">-->
<!--                                                <input name="Password" placeholder="Password" type="password" required="">-->
<!--                                                <div class="sign-up">-->
<!--                                                    <input type="submit" value="Sign in"/>-->
<!--                                                </div>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">-->
<!--                                    <div class="facts">-->
<!--                                        <div class="register">-->
<!--                                            <form action="#" method="post">-->
<!--                                                <input placeholder="Name" name="Name" type="text" required="">-->
<!--                                                <input placeholder="Email Address" name="Email" type="email" required="">-->
<!--                                                <input placeholder="Password" name="Password" type="password" required="">-->
<!--                                                <input placeholder="Confirm Password" name="Password" type="password" required="">-->
<!--                                                <div class="sign-up">-->
<!--                                                    <input type="submit" value="Create Account"/>-->
<!--                                                </div>-->
<!--                                            </form>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>-->
<!--                        <script type="text/javascript">-->
<!--                            $(document).ready(function () {-->
<!--                                $('#horizontalTab').easyResponsiveTabs({-->
<!--                                    type: 'default', //Types: default, vertical, accordion-->
<!--                                    width: 'auto', //auto or any width like 600px-->
<!--                                    fit: true   // 100% fit in a container-->
<!--                                });-->
<!--                            });-->
<!--                        </script>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
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
                    <li><a href="index.php">Home</a></li>
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
<!-- //navigation -->
<!--banner-->
<div class="banner banner10">
    <div class="container">
        <h2>Product Description</h2>
    </div>
</div>
<!--//banner-->
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
    <div class="container">
        <ul>
            <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home </a> <i>/</i></li>
            <li>Profile</li>
        </ul>
    </div>
</div>
<!-- //breadcrumbs -->

    <div class="single">
        <div class="container">
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                <div id="profile-option" class="col-md-11">
                    <div class="user-image">
                        <?php $userInfo = $userObject->userInfoById(Session::get("userId")); if ($userInfo): ?>
<!--                            <img src="man.png" alt="" class="img-circle img-responsive" />-->
                            <?php while ($info = $userInfo->fetch_assoc()): ?>
                                <?php if (strcmp($info['image'], "NULL") != 0): ?>
                                    <img src="<?php echo $info['image']; ?>" alt="" class="img-circle img-responsive" />
                                <?php else: ?>
                                    <img src="man.png" alt="" class="img-circle img-responsive" />
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-11" id="user-option">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" class="text-center" data-toggle="tab" style="width: 150px">Information </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile" aria-controls="profile" role="tab" class="text-center" data-toggle="tab" style="width: 150px;">Profile Update</a>
                            </li>
                            <li role="presentation">
                                <a href="#messages" aria-controls="messages" role="tab" class="text-center" data-toggle="tab" style="width: 150px;">Send Text</a>
                            </li>
                            <li role="presentation">
                                <a href="#allMessage" aria-controls="messages" role="tab" class="text-center" data-toggle="tab" style="width: 150px;">Messages</a>
                            </li>
                            <li role="presentation">
                                <a href="#settings" aria-controls="settings" role="tab" class="text-center" data-toggle="tab" style="width: 150px;">My Cart </a>
                            </li>
                            <?php
                            if (isset($_GET['action']) &&  $_GET['action'] == 'logoutCustomer')
                            {
                                $cartObject->deleteCart();
                                session_destroy();
                                echo "<script>window.location = 'index.php';</script>";
                            }
                            ?>
                            <li role="presentation">
                                <a href="?action=logoutCustomer"  style="width: 150px;" class="text-center"> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--1-->
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                <?php if ( (isset($_POST['update'])) && $_SERVER['REQUEST_METHOD'] == 'POST' ): ?>
                    <?php $userObject->updateUserInfoById(Session::get("userId"), $_POST, $_FILES); ?>
                <?php endif; ?>
                <div id="tab-info" class="col-md-11">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="user-info">
                                    <div class="col-md-6">
                                        <div class="user-information-part-one">
                                            <h4> Name :</h4>
                                            <h4> E-mail           : </h4>
                                            <h4> Country zip-code : </h4>
                                            <h4> Phone            : </h4>
                                            <h4> Country          : </h4>
                                            <h4> City             : </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="user-information-part-two">
                                            <?php $userInfo = $userObject->userInfoById(Session::get("userId")); if ($userInfo): ?>
                                                <?php while ($info = $userInfo->fetch_assoc()): ?>
                                                    <h4> <?php echo $info['name'] ?> </h4>
                                                    <h4> <?php echo $info['email'] ?> </h4>
                                                    <h4> <?php echo $info['zip'] ?> </h4>
                                                    <h4> <?php echo $info['phone'] ?> </h4>
                                                    <h4> <?php echo $info['country'] ?> </h4>
                                                    <h4> <?php echo $info['city'] ?> </h4>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php global $userEmail;?>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="user-info-update">
                                    <div class="col-md-11">
                                        <div class="user-update-part-two">
                                            <?php $userInfo = $userObject->userInfoById(Session::get("userId")); if ($userInfo): ?>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <?php while ($info = $userInfo->fetch_assoc()): ?>
                                                        <div class="form-group">
                                                            <label for="name">Name:</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $info['name'] ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">E-mail:</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $userEmail = $info['email'] ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="zip">Country Zip-Code:</label>
                                                            <input type="text" class="form-control" id="zip" name="zip" value="<?php if (strcmp( $info['zip'], "NULL") == 0) echo "Empty"; else echo $info['zip']; ?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Phone:</label>
                                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php if (strcmp( $info['phone'], "NULL") == 0) echo "Empty"; else echo $info['phone'];?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image">Image:</label>
                                                            <input type="file" id="image" name="image" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="country">Country:</label>
                                                            <input type="text" class="form-control" id="country" name="country" value="<?php if (strcmp( $info['country'], "NULL") == 0) echo "Empty"; else echo $info['country'];?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="city"> City:</label>
                                                            <input type="text" class="form-control" id="city" name="city" value="<?php if (strcmp( $info['city'], "NULL") == 0) echo "Empty"; else echo $info['city'];?>" />
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-default w3ls-cart" name="update" > <i class="fa fa-thumbs-o-up"></i> Update</button>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['messageSubmit']) ) : ?>
                            <?php $messageObject->insertMessage($_POST['subject'], $_POST['message'], Session::get("userId"), $userEmail); ?>
                        <?php endif; ?>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="mail">
                                    <h3>Mail Us</h3>
                                    <div class="agile_mail_grids">
                                        <div class="col-md-4 contact-left">
                                            <h4>Address</h4>
                                            <p>est eligendi optio cumque nihil impedit quo minus id quod maxime
                                                <span>26 56D Rescue,US</span></p>
                                            <ul>
                                                <li>Free Phone :+1 078 4589 2456</li>
                                                <li>Telephone :+1 078 4589 2456</li>
                                                <li>Fax :+1 078 4589 2456</li>
                                                <li><a href="mailto:info@example.com">info@example.com</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-7 contact-left">
                                            <h4>Contact Form</h4>
                                            <form action="" method="post" >
                                                <input type="text" name="subject" placeholder="Your Subject" required="" />
                                                <textarea name="message" placeholder="Message..." required=""></textarea>
                                                <button name="messageSubmit" type="submit" class="w3ls-cart btn" > <i class="fa fa-envelope-o"></i> Send </button>
                                            </form>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="settings">
                                <?php if (isset($_GET['removeid']) && ($_GET['removeid'] != null) ):  ?>
                                    <?php $cartObject->removeOrderedProductById($_GET['removeid']); ?>
                                <?php endif;  ?>
                                <div class="user-cart">
                                    <h2>Your Cart</h2>
                                    <?php $userCart = $cartObject->getOrderedProductByUserId(Session::get("userId")); if (!$userCart): ?>
                                        <div class="empty" style="margin-top: 15px; margin-bottom: 10px">
                                            <div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Warning! </strong> Cart is Empty.
                                            </div>
                                        </div>
                                    <?php else: $i = 0; ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 8%;">#</th>
                                                    <th class="text-center">Product Name</th>
                                                    <th class="text-center" style="width: 8%;">Price</th>
                                                    <th class="text-center" style="width: 8%;">Quantity</th>
                                                    <th class="text-center" style="width: 8%;">Total Price</th>
                                                    <th class="text-center" style="width: 8%;">Date</th>
                                                    <th class="text-center" style="width: 24%;">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($cart = $userCart->fetch_assoc()): $i++; ?>
                                                    <tr>
                                                        <th scope="row" class="text-center"><?php echo $i; ?></th>
                                                        <td class="text-center"><?php echo $cart['productname']; ?></td>
                                                        <td class="text-center">$<?php echo $cart['price']; ?></td>
                                                        <td class="text-center"><?php echo $cart['quantity']; ?></td>
                                                        <td class="text-center">$<?php echo $cart['quantity']*$cart['price'];?></td>
                                                        <td class="text-center"><?php echo $formateObject->formatDate($cart['date']) ;?></td>
                                                        <td class="text-center"><?php if ($cart['status'] == 0) {echo " Pending ";} else { ?> <a href="?removeid=<?php echo $cart['id']; ?>" class="btn btn-danger" onclick="return confirm('You Want to Delete ?');"> <i class="fa fa-times"></i> Remove </a> <?php  } ?></td>
                                                        <td class="text-center">

                                                        </td>
                                                    </tr>
                                                <?php  endwhile; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="allMessage">
                                <div class="text-center">
                                    Messages
                                </div>
                                <?php $message = $messageObject->getAllAdminMessageByEmail(Session::get("userEmail")); if ($message): ?>
                                    <?php while ($allMessage = $message->fetch_assoc() ):  ?>
                                        <div class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><?php echo $allMessage['subject'] ?></h3>
                                            </div>
                                            <div class="panel-body"> <?php echo $allMessage['message'] ?> </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>
            </div><!--1-->
        </div>
    </div>

<?php
    include 'footer.php'
?>