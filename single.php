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
    if (!isset($_GET['proid']) || $_GET['proid'] == null) echo "<script>window.location = 'index.php'</script>";
    else $productId = $_GET['proid'];
?>
<?php
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
	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Product Description</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Product Description</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->  
	<!-- single -->
<?php $proInfo = $productObject->getProductById($productId); if ($proInfo): ?>
    <?php while ($info = $proInfo->fetch_assoc()): $cat = $info['catid']; ?>
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="admin/<?php echo $info['image'];?>">
							<div class="thumb-image"> <img src="admin/<?php echo $info['image'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
					</ul>
				</div>
				<!-- flexslider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					<script src="js/imagezoom.js"></script>
				<!-- //zooming-effect -->
			</div>
            <!--Start-->

                    <div class="col-md-8 single-right">
                        <h3><?php echo $info['proname']?></h3>
                        <div class="rating1">
                            <span class="star-rating">
                                <?php $rating = $productObject->rating($productId); if ($rating) :?>
                                    <?php while ($rev = $rating->fetch_assoc()): ?>
                                        <?php for ($i = 1; $i <= $rev['rate']; ++$i): ?>
                                            <span class="fa fa-star-o"></span>
                                        <?php endfor; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </span>
                        </div>
                        <div class="description">
                            <h5><i>Description</i></h5>
                            <p><?php echo $info['body'];?></p>
                        </div>
                        <div class="color-quality">
                            <div class="color-quality-left">
                                <h5>Color : </h5>
                                <ul>
                                    <li><a href="#" class="brown" style="color :<?php echo $info['type'];?>"><span></span></a></li>
                                </ul>
                            </div>
                            <div class="color-quality-right">
                                <!--quantity-->
                                        <script>
                                        $('.value-plus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                            divUpd.text(newVal);
                                        });

                                        $('.value-minus1').on('click', function(){
                                            var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                            if(newVal >= 1) divUpd.text(newVal);
                                        });
                                        </script>
                                    <!--quantity-->

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCart']))
                            {
                                $cartObject->addToCart($_POST['quantity'], $productId);
                            }
                        ?>
                        <div class="simpleCart_shelfItem">
                            <p><i class="item_price">$<?php echo $info['price'];?></i></p>
                            <form class="navbar-form navbar-left" method="post" action="">
                                <div class="form-group w3-agile">
                                    <input type="number" name="quantity" class="form-control" value="1">
                                </div>
                                <button type="submit" class="btn btn-default w3ls-cart" name="addCart" >Add To Cart</button>
                            </form>
                        </div>
                    </div>
            <!--End-->
			<div class="clearfix"> </div>
		</div>
	</div>
    <?php endwhile; ?>
<?php endif; ?>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && (Session::get("userLogin"))  ): ?>
        <?php $allCategoryObject->inseertProductReviewByCustomerId(Session::get("userId"), $_POST['Name'], $_POST['Email'], $_POST['Review'], $_POST['rate'], $productId, $_POST['Telephone']);  ?>
    <?php endif;  ?>

<?php $proInfo = $productObject->getProductById($productId); if ($proInfo): ?>
    <?php while ($info = $proInfo->fetch_assoc()): ?>
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
                        <?php if (Session::get("userLogin")): ?>
						    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
                        <?php endif; ?>
                    </ul>
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
						<h3><?php echo $info['proname'];?></h3>
						<p><?php echo $info['body'];?></p>
					</div>	

					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<div class="additional_info_sub_grids">
							<div class="col-xs-10 additional_info_sub_grid_right">
                                <?php $rating = $productObject->rating($productId); if ($rating) :?>
                                    <?php while ($rev = $rating->fetch_assoc()): ?>
								<div class="additional_info_sub_grid_rightl">
									<a href="#"><?php echo $rev['name'];?></a>
									<h5><?php echo $rev['date'];?></h5>
									<p><?php echo $rev['review'];?></p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
                                            <?php for ($i = 1; $i <= $rev['rate']; ++$i): ?>
                                                <span class="fa fa-star-o"></span>
                                            <?php endfor; ?>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
                            <?php endwhile; ?>
                            <?php endif; ?>
							<div class="clearfix"> </div>
						</div>
						<div class="review_grids">
							<h5>Add A Review</h5>
                            <form action="#review" id="review" method="post">
                                <div class="form-group">
                                    <label for="usr">Name:</label>
                                    <input type="text" class="form-control" name="Name" id="usr" placeholder="Your Name" />
                                </div>
                                <div class="form-group" style="position: relative;right: 15px;">
                                    <label for="pwd" style="position: relative;left: 15px;">E-mail:</label>
                                    <input type="email" name="Email" class="form-control" id="pwd" placeholder="Your E-mail" />
                                </div>
                                <div class="form-group">
                                    <label for="rate">Rate:</label>
                                    <input type="number" name="rate" class="form-control" id="rate" placeholder="Rate 1-5 " />
                                </div>
                                <div class="form-group">
                                    <label for="ph">Phone:</label>
                                    <input type="text" name="Telephone" class="form-control" id="ph" placeholder="Your Phone" />
                                </div>
                                <div class="form-group">
                                    <label for="comment">Review:</label>
                                    <textarea class="form-control" name="Review" rows="5" id="comment" placeholder="Your Review"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit"  value="Submit" />
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>
    <?php endwhile; ?>
<?php endif; ?>
	<!-- Related Products -->
<?php $proInfo = $productObject->getProductByCategory($cat); if ($proInfo): ?>
	<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<ul id="flexiselDemo2">
                <?php  while ($related = $proInfo->fetch_assoc()): ?>
				<li>
					<div class="w3l_related_products_grid">
						<div class="agile_ecommerce_tab_left mobiles_grid">
							<div class="hs-wrapper hs-wrapper3">
                                <?php for ($i = 1; $i <= 5; ++$i): ?>
								    <img src="admin/<?php echo $related['image'] ;?>" alt=" <?php echo $related['proname'];?> " class="img-responsive" />
                                <?php endfor; ?>
							</div>
							<h5><a href="single.php?proid=<?php echo $related['proid'];?>"><?php echo $related['proname'];?></a></h5>
							<div class="simpleCart_shelfItem"> 
								<p class="flexisel_ecommerce_cart"><i class="item_price">$ <?php echo $related['price'];?></i></p>
							</div>
                            <div>
                                <a href="single.php?proid=<?php echo $related['proid'];?>" class="btn btn-default w3ls-cart">Add to Cart</a>
                            </div>
						</div>
					</div>
				</li>
                <?php endwhile; ?>
			</ul>
			
				<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo2").flexisel({
							visibleItems:4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint:480,
									visibleItems: 1
								},
								landscape: {
									changePoint:640,
									visibleItems:2
								},
								tablet: {
									changePoint:768,
									visibleItems: 3
								}
							}
						});
					});
				</script>

				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
<?php endif; ?>
	<!-- //Related Products -->

	<!-- //single -->
	<!-- newsletter -->
	<?php include 'footer.php'?>