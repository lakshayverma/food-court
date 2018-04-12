<?php
require_once('includes/logic.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo getSiteName(); ?>  | Home </title>
        <?php
        include_once("files.php");
        ?>
    </head>
    <body>
        <!-- banner -->
        <div class="banner">
            <!-- header -->
            <?php
            include_once("header.php");
            ?>
            <!-- //header-end -->
            <!-- banner-text -->
            <div class="banner-text">
                <div class="container">
                    <h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2>
                </div>
            </div>
        </div>
        <!-- //banner -->
        <!-- add-products -->
        <!-- <div class="add-products">
            <div class="container">
                <div class="add-products-row">
                    <php
                    include_once("connect.php");
                    $qu = mysqli_query($conn, "select * from combopack order by cid desc limit 2") or die(mysqli_error($conn));
                    while ($ans = mysqli_fetch_array($qu)) {
                        ?>
                        <div class="w3ls-add-grids">
                            <?php print "<a href='combo.php?cuid=$ans[0]'>" ?>
                            <h4><?php print $ans[1] ?></h4>
                            <h5>RS. <?php print $ans[2] ?>/-</h5>
                            <h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
                            </a>
                        </div>
                        <php
                    }
                    ?>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div> -->>
        <!-- //add-products -->
        <!-- order -->
        <div class="wthree-order">
            <img src="images/i2.jpg" class="w3order-img" alt=""/>
            <div class="container">
                <h3 class="w3ls-title">How To Order Online Food</h3>
                <p class="w3lsorder-text">Get your favourite food in 4 simple steps.</p>
                <div class="order-agileinfo">
                    <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                        <div class="order-w3text">
                            <i class="fa fa-map" aria-hidden="true"></i>
                            <h5>Search Menu</h5>
                            <span>1</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                        <div class="order-w3text">
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                            <h5>Choose Food</h5>
                            <span>2</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                        <div class="order-w3text">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <h5>Pay Money</h5>
                            <span>3</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
                        <div class="order-w3text">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <h5>Enjoy Food</h5>
                            <span>4</span>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //order -->
        <!-- deals -->
        <div class="w3agile-deals">
            <div class="container">
                <h3 class="w3ls-title">Special Services</h3>
                <div class="dealsrow">
                    <div class="col-md-6 col-sm-6 deals-grids">
                        <div class="deals-left">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                        </div>
                        <div class="deals-right">
                            <h4>CASH ON DELIVERY</h4>
                            <p>We have a facilty to take order online and deliver food at your given location</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="col-md-6 col-sm-6 deals-grids">
                        <div class="deals-left">
                            <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                        </div>
                        <div class="deals-right">
                            <h4>Party Orders</h4>
                            <p>We also arrage order for parties, kities and ceremonies</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //deals -->
        <!-- dishes -->
        <div class="w3agile-spldishes">
            <div class="container">
                <h3 class="w3ls-title">Special Foods</h3>
                <div class="spldishes-agileinfo">
                    <div class="col-md-3 spldishes-w3left">
                        <h5 class="w3ltitle">Staple Specials</h5>
                        <p>
                            The <strong>best</strong> of <em>Staples</em>, curated here by our master chefs. Dive right in and get the best offers.
                        </p>
                    </div>
                    <div class="col-md-9 spldishes-grids">
                        <!-- Owl-Carousel -->
                        <div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
                            <?php
                            include_once("connect.php");
                            $qu = mysqli_query($conn, "select * from product order by rand() desc limit 15") or die(mysqli_error($conn));
                            while ($ans = mysqli_fetch_array($qu)) {
                                ?>
                                <a href="<?php print "productdetails.php?pid=$ans[0]" ?>" class="item g1">
                                    <img class="lazyOwl" height="180px" src="product/<?php print $ans[5] ?>" title="Our latest gallery" alt=""/>
                                    <div class="agile-dish-caption">
                                        <h4><?php print $ans[3] ?></h4>
                                        <span>Rs <?php print $ans[6] ?>/-</span>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <?php include_once("footer.php"); ?>
        <!-- //footer -->
        <!-- cart-js -->
        <script src="js/minicart.js"></script>
        <script>
            w3ls.render();

            w3ls.cart.on('w3sb_checkout', function (evt) {
                var items, len, i;

                if (this.subtotal() > 0) {
                    items = this.items();

                    for (i = 0, len = items.length; i < len; i++) {
                    }
                }
            });
        </script>
        <!-- //cart-js -->
        <!-- Owl-Carousel-JavaScript -->
        <script src="js/owl.carousel.js"></script>
        <script>
            $(document).ready(function () {
                $("#owl-demo").owlCarousel({
                    items: 3,
                    lazyLoad: true,
                    autoPlay: true,
                    pagination: true,
                });
            });
        </script>
        <!-- //Owl-Carousel-JavaScript -->
        <!-- start-smooth-scrolling -->
        <script src="js/SmoothScroll.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();

                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });
        </script>
        <!-- //end-smooth-scrolling -->
        <!-- smooth-scrolling-of-move-up -->
        <script type="text/javascript">
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear'
                 };
                 */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <!-- //smooth-scrolling-of-move-up -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.js"></script>
    </body>
</html>
