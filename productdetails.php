<?php
ob_start();
session_start();
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
            ?>
            <?php
            include_once("banner.php");
            ?>
        </div>
        <!-- //banner -->
        <!-- breadcrumb -->
        <div class="container">
            <ol class="breadcrumb w3l-crumbs">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Dishes</li>
            </ol>
        </div>
        <table width="100%" border="0" cellpadding="0">
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width='15%'>&nbsp;</td>
                <td> <?php
                    $a = $_GET["pid"];
                    include_once("connect.php");
                    $qu = mysqli_query($conn, "select * from product where pid=$a") or die(mysqli_error($conn));
                    $ans = mysqli_fetch_array($qu);
                    ?>
                    <section>
                        <div class="modal-body">
                            <div class="col-md-5 modal_body_left">
                                <img src="product/<?php print $ans[5] ?>" alt=" " class="img-responsive">
                            </div>
                            <div class="col-md-7 modal_body_right single-top-right">
                                <h3 class="item_name"><?php print $ans[3]; ?></h3>
                                <div class="single-price">
                                    <ul>
                                        <li>Rs. <?php print $ans[6] ?>/-</li>

                                    </ul>
                                </div>
                                <p class="single-price-text"><?php print $ans[7]; ?></p>
                                <form method="post">
                                    <input type="text" name="qty">
                                    <input type="submit" name="cart" class="w3ls-cart" value="Add To Cart">
                                </form>
                                <?php
                                if (isset($_POST["con"])) {
                                    header("location:category.php");
                                }
                                if (isset($_POST["cart"])) {
                                    if (!isset($_SESSION["email"])) {
                                        header("location:login.php?pid=$ans[0]");
                                    } else {
                                        $pid = $ans[0];
                                        $pname = $ans[3];
                                        $pprice = $ans[6];
                                        $pimg = $ans[5];
                                        $qty = (isset($_POST["qty"])) ? $_POST["qty"] : 0;
                                        if ($qty) {
                                            $tcost = $pprice * $qty;
                                            $uname = $_SESSION["email"];
                                            $qu2 = mysqli_query($conn, "select * from cart where pid=$ans[0] and uname='$uname'") or die(mysqli_error($conn));
                                            if (mysqli_affected_rows($conn) == 0) {
                                                $qu1 = mysqli_query($conn, "insert into cart(pid,name,image,price,quantity,totalcost,uname) values($pid,'$pname','$pimg',$pprice,$qty,$tcost,'$uname')") or die(mysqli_error($conn));
                                            } else {
                                                $qu1 = mysqli_query($conn, "update cart set quantity=quantity+$qty,totalcost=totalcost+$tcost where pid=$ans[0] and uname='$uname'") or die(mysqli_error($conn));
                                            }
                                            if (mysqli_affected_rows($conn)) {
                                                header("location:showcart.php");
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </section>
                </td>
                <td width="15%">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>

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
