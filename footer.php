<?php
/**
 * Footer File of Template
 * Created by PhpStorm.
 * User: Tushar Khan
 * Date: 9/8/2017
 * Time: 6:12 AM
 */
?>
<div class="newsletter">
    <div class="container">
        <div class="col-md-6 w3agile_newsletter_left">
            <h3>Newsletter</h3>
            <p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
        </div>
        <div class="col-md-6 w3agile_newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" placeholder="Email" required="">
                <input type="submit" value="" />
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?php echo $allCategoryObject->address;  ?></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:<?php echo $allCategoryObject->email;  ?>"><?php echo $allCategoryObject->email;  ?></a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php echo $allCategoryObject->phone;  ?></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="mail.php">Contact Us</a></li>
                    <li><a href="faq.php">FAQ's</a></li>
                    <li><a href="products.php">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    <li><a href="products.php">Mobiles</a></li>
                    <li><a href="products.php">Laptops</a></li>
                    <li><a href="products.php">Purifiers</a></li>
                    <li><a href="products.php">Wearables</a></li>
                    <li><a href="products.php">Kitchen</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Today's Deals</a></li>
                </ul>
                <h4>Follow Us</h4>
                <div class="agileits_social_button">
                    <ul>
                        <?php $social = $allCategoryObject->allSocialMediaLinks();  if (!$social): ?>
                            <li><a href="#" class="facebook">  </a></li>
                            <li><a href="#" class="twitter"> </a></li>
                            <li><a href="#" class="google"> </a></li>
                            <li><a href="#" class="pinterest"> </a></li>
                        <?php else:  ?>
                            <?php while ($link = $social->fetch_assoc()): ?>
                                <li><a href="<?php echo $link['link']; ?>" class="fa <?php echo $link['icon']; ?> fa-2x">  </a></li>
                            <?php endwhile; ?>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="footer-copy1">
            <div class="footer-copy-pos">
                <a href="#home1" class="scroll"><img src="images/arrow.png" alt=" " class="img-responsive" /></a>
            </div>
        </div>
        <div class="container">
            <?php date_default_timezone_set('Asia/Dhaka'); ?>
            <p>&copy; <?php echo date('y-m-d');?> Electronic Store. All rights reserved | Design by <a href="https://www.facebook.com/glbaba.tushar">Tushar Khan</a></p>
        </div>
    </div>
</div>
</body>
</html>