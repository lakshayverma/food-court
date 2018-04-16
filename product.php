<?php
require_once('includes/logic.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo getSiteName(); ?>  | Products </title>
<?php
include_once("files.php");
?>
</head>
<body>
    <!-- banner -->
    <div class="banner about-w3bnr">
        <?php
        include_once("header.php");
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
                    <h4>Our Menu</h4>
                    <div class="clearfix"> </div>
                </div>
                <div class="products-row">
                <?php
                include "connect.php";
                if (isset($_GET["cuid"])) {
                    $pid=$_GET["cuid"];
                    $qu="select * from product where cuisine=$pid";
                } elseif (isset($_GET["subcatid"])) {
                    $pid=$_GET["subcatid"];
                    $qu="select * from product where cid=$pid";
                } else {
                    $pid=$_GET["sname"];
                    $qu="select * from product where name like '%$pid%'";
                }


                $res=mysqli_query($conn, $qu) or die(mysqli_error($conn));
                if (mysqli_affected_rows($conn)>0) {
                    while ($ans=mysqli_fetch_array($res)) {
                        ?>
                    <div class="col-xs-6 col-sm-4 product-grids">
                        <div class="flip-container">
                            <div class="flipper agile-products">
                                <div class="front">
                                    <img src="product/<?php print $ans[5]?>" width="250px" class="img-responsive" alt="img">
                                    <div class="agile-product-text">
                                        <h5><?php print $ans[3]; ?></h5>
                                    </div>
                                </div>
                                <div class="back">
                                    <h4><?php print $ans[3]; ?></h4>
                                    <p><?php print substr($ans[7], 0, 40); ?></p>
                                    <h6><sup>Rs. <?php print $ans[6]; ?>/-</sup></h6>
                                    <form action="#" method="post">
                                        <a href="productdetails.php?pid=<?php print $ans[0]; ?>">More</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
                    ?>
                    </div>
            </div>
            <div class="col-md-3 rsidebar">
                <div class="rsidebar-top">
                    <div class="slider-left">
                        <h4>All Category</h4>
                        <div class="row row1 scroll-pane">
                        <ul>
                            <?php
                        include_once("connect.php");
                        $qu=mysqli_query($conn, "select * from addcategory") or die(mysqli_error($conn));
                        while ($ans=mysqli_fetch_array($qu)) {
                            ?>
                            <?php
                            print "<li><a href='subcategory.php?catid=$ans[0]'>$ans[1]</a></li>"; ?></label>
                            <?php
                        }
                            ?>

                        </ul></div>
                    </div>
                    <div class="sidebar-row">
                        <div class="clearfix"> </div>
                        </div>
                       <div class="sidebar-row">
                        <h4>All Cuisine</h4>
                        <ul>
                            <?php
                                                    include_once("connect.php");
                                                    $qu="select * from cuisine";
                                                    $res=mysqli_query($conn, $qu) or die(mysqli_error($conn));
                                                    while ($ans=mysqli_fetch_array($res)) {
                                                        print "<li><a href='product.php?cuid=$ans[0]'>$ans[1]</a></li>";
                                                    }
                                                    ?>
                        </ul></div>
                        <div class="clearfix"> </div>
                    </div>

                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //products --><!-- dishes --><!-- //dishes -->
    <!-- modal -->
<?php
    include_once("footer.php");
    ?>
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
        $(document).ready(function() {
            $("#owl-demo").owlCarousel ({
                items : 3,
                lazyLoad : true,
                autoPlay : true,
                pagination : true,
            });
        });
    </script>
    <!-- //Owl-Carousel-JavaScript -->
    <!-- the jScrollPane script -->
    <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" id="sourcecode">
        $(function()
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
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){
                    event.preventDefault();

            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
            });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };
            */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>
