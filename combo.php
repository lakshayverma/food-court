<?php
session_start();
include_once "connect.php";

function add_to_cart($pid, $pname, $pprice, $pimg)
{
    global $conn;

    $qty = 1;
    $tcost = $pprice * $qty;
    $uname = $_SESSION["email"];
    $lk = "select * from cart where pid=$pid and uname='{$uname}'";
    $qu2 = mysqli_query($conn, $lk) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn) == 0) {
        $qu1 = mysqli_query($conn, "insert into cart(pid,name,image,price,quantity,totalcost,uname) values($pid,'$pname','$pimg',$pprice,$qty,$tcost,'$uname')") or die(mysqli_error($conn));
    } else {
        $qu1 = mysqli_query($conn, "update cart set quantity=quantity+$qty,totalcost=totalcost+$tcost where pid=$pid and uname='$uname'") or die(mysqli_error($conn));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sunny Side Up Bakery  | Products </title>
        <?php
        include_once("files.php");
        ?>
    </head>
    <body>
        <!-- banner -->
        <div class="banner about-w3bnr">
            <?php
            include_once("header.php");
            if (isset($_GET['add'])) {
                if ($_GET['add'] == 'true') {
                    $lakshay = $_GET['cuid'];
                    $sql = "select * from product where cid=$lakshay";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    while ($ans = mysqli_fetch_array($result)) {
                        $pid = $ans["pid"];
                        $pname = $ans["name"];
                        $pprice = $ans["price"];
                        $pimg = $ans["image"];

                        add_to_cart($pid, $pname, $pprice, $pimg);
                    }
                }
            }
            ?>
            <?php
            include_once("banner.php");
            ?>
        </div>
        <!-- //banner -->
        <!-- breadcrumb -->
        <div class="container">
            <ol class="breadcrumb w3l-crumbs">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Dishes</li>
            </ol>
        </div>
        <!-- //breadcrumb -->
        <!-- products -->
        <div class="products">
            <div class="container">
                <div class="col-md-9 product-w3ls-right">
                    <div class="product-top">
                        <h4>Combo Packs</h4>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="products-row">
                        <?php
                        if (isset($_GET["cuid"])) {
                            $a = $_GET["cuid"];
                            $qu = "select * from combopack where cid=$a";
                        } else {
                            $qu = "select * from combopack";
                        }
                        $res = mysqli_query($conn, $qu) or die(mysqli_error($conn));
                        if (mysqli_affected_rows($conn) > 0) {
                            while ($ans = mysqli_fetch_array($res)) {
                                ?>
                                <div class="col-xs-6 col-sm-6 product-grids">
                                    <div class="flip-container flip-container1">
                                        <div class="flipper agile-products">
                                            <div class="front">
                                                <div class="agile-product-text agile-product-text2">
                                                    <h5><?php print "<a href='combopro.php?cuid=$ans[0]'>$ans[1]</a>"; ?></h5>
                                                </div>
                                                <?php print "<a href='combopro.php?id=$ans[0]'><img src='product/$ans[4]' width='340px'></a>"; ?>
                                            </div>
                                            <div class="back">
                                                <h4><?php print $ans[1] ?></h4>
                                                <p><?php print $ans[3]; ?></p>
                                                <h6><sup>Rs. <?php print $ans[2]; ?>/-</sup></h6>
                                                <form action="#" method="post">
                                                    <button type="submit" class="w3ls-cart pw3ls-cart">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                        <?php print "<a href='combo.php?cuid=$ans[0]&id=click&add=true'>Add to cart</a>"; ?>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <?php
                include_once("right.php");
                ?>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //products -->
        <div class="container"></div>
        <!-- dishes --><!-- //dishes -->
        <!-- modal -->
        <div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <section>
                        <div class="modal-body">
                            <div class="col-md-5 modal_body_left">
                                <img src="images/s1.jpg" alt=" " class="img-responsive">
                            </div>
                            <div class="col-md-7 modal_body_right single-top-right">
                                <h3 class="item_name">France Special Dish</h3>
                                <p>Proin placerat urna et consequat efficitur, sem odio blandit enim</p>
                                <div class="single-rating">
                                    <ul>
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <li class="rating">20 reviews</li>
                                        <li><a href="#">Add your review</a></li>
                                    </ul>
                                </div>
                                <div class="single-price">
                                    <ul>
                                        <li>$18</li>
                                        <li><del>$20</del></li>
                                        <li><span class="w3off">10% OFF</span></li>
                                        <li>Ends on : Dec,5th</li>
                                        <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li>
                                    </ul>
                                </div>
                                <p class="single-price-text">Fusce a egestas nibh, eget ornare erat. Proin placerat, urna et consequat efficitur, sem odio blandit enim, sit amet euismod turpis est mattis lectus. Vestibulum maximus quam et quam egestas imperdiet. In dignissim auctor viverra. </p>
                                <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="w3ls_item" value="France Special" />
                                    <input type="hidden" name="amount" value="18.00" />
                                    <button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                </form>
                                <a href="#" class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist</a>
                                <div class="single-page-icons social-icons">
                                    <ul>
                                        <li><h4>Share on</h4></li>
                                        <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                                        <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                                        <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                                        <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                                        <li><a href="#" class="fa fa-rss icon rss"> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- //modal -->
        <!-- subscribe -->
        <?php include_once("footer.php"); ?>
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
        <!-- the jScrollPane script -->
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" id="sourcecode">
            $(function ()
            {
                $('.scroll-pane').jScrollPane();
            });
        </script>
        <!-- //the jScrollPane script -->
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script> <!-- the mouse wheel plugin -->
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
