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

                        <?php
                        if (isset($_GET['action']) &&  $_GET['action'] == 'logoutCustomer')
                        {
                            $cartObject->deleteCart();
                            session_destroy();
                            echo "<script>window.location = 'index.php';</script>";
                        }
                        ?>
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
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Add to Cart</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <?php
        global $total;
        $total = 0;
        global $emptyCart;
    ?>
    <!-- Add to Cart -->
    <div class="single">
        <div class="container">
            <div class="row">
                <?php if ( isset($_GET['delCart']) && $_GET['delCart'] != null ): ?>
                    <?php $cartObject->delCartById($_GET['delCart']); ?>
                <?php endif; ?>

                <?php if ( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['updateCart']) ): ?>
                    <?php $cartObject->updateQuantity($_POST['cartid'], $_POST['quantity']); ?>
                <?php endif; ?>
                <?php $allCartProduct = $cartObject->allProductBySessionId(); if ($allCartProduct): $emptyCart = true; $i = 0; ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cart-table">
                            <table class="table">
                                <thead class="table table-bordered">
                                    <tr>
                                        <th class="text-center" style="width: 8%;">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center" style="width: 8%;">Price</th>
                                        <th class="text-center" style="width: 8%;">Quantity</th>
                                        <th class="text-center" style="width: 8%;">Price</th>
                                        <th class="text-center" style="width: 24%;">Image</th>
                                        <th class="text-center" style="width: 22%;">Update</th>
                                        <th class="text-center" style="width: 8%;">Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while ( $allCart = $allCartProduct->fetch_assoc() ): $i++; ?>
                                        <tr>
                                            <th scope="row" class="text-center"><?php echo $i; ?></th>
                                            <td class="text-center"><?php echo $allCart['proname']; ?></td>
                                            <td class="text-center">$<?php echo $allCart['price']; ?></td>
                                            <td class="text-center"><?php echo $allCart['quantity']; ?></td>
                                            <td class="text-center">$<?php echo $allCart['quantity']*$allCart['price']; $total += $allCart['quantity']*$allCart['price']; ?></td>
                                            <td class="text-center">
                                                <img src="admin/<?php echo $allCart['image']; ?>" title="<?php echo $allCart['proname']; ?>" alt="" class="img-rounded img-responsive" style="height: 65%;width: 70%;" />
                                            </td>
                                            <td class="text-center">
                                                <form class="navbar-form navbar-left" method="post" action="">
                                                    <input type="hidden" name="cartid" style="width: 30%;" class="form-control" value="<?php echo $allCart['cartid']; ?>" title="Product Quantity" />
                                                    <input type="number" name="quantity" style="width: 30%;" class="form-control" value="<?php echo $allCart['quantity']; ?>" title="Product Quantity" />
                                                    <button type="submit" class="btn btn-default w3ls-cart" name="updateCart" > <i class="fa fa-check"></i> Update </button>
                                                </form>
                                            </td>
                                            <?php  ?>
                                            <td class="text-center">
                                                <a href="?delCart=<?php echo $allCart['cartid']; ?>" onclick="return confirm('Are You Sure You Want to Delete ?');" class="btn btn-danger"> <i class="fa fa-pencil-square-o"></i> Delete </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <?php
                        echo "<div class='alert alert-danger alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong> Warning !</strong> Cart is Empty.
                          </div>";
                    ?>
                <?php endif; ?>
                <?php if (!$emptyCart): ?>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 pull-right">
                        <?php
                            echo "<div class='alert alert-danger alert-dismissable'>
                                      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                      <strong> Warning !</strong> Cart is Empty.
                                  </div>";
                        ?>
                    </div>
                <?php else: ?>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 pull-right hover">
                        <div class="cart-info" style="background-color: #d9edf7; padding: 15%;box-shadow: 5px 4px 18px #888888;border-radius: 3%; font-weight: 700">
                            <p> Total Price :  $<?php echo $total; Session::set("total", $total); ?>  </p>
                            <p> Vat :  5% </p>
                            <p>Total With Vat :  $<?php echo ($total+(($total*5)/100)); ?> </p>
                        </div>
                        <div class="checkout-button" style="box-shadow: 5px 4px 18px #888888;">
                            <a class="btn btn-block btn-warning text-capitalize" href="payment.php">checkout</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- //Add to Cart -->


<?php
    include 'footer.php';
?>