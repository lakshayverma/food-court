<?php
require_once('includes/logic.php');

if (isset($_POST["continue"])) {
    header("location:category.php");
}
if (isset($_POST["checkout"])) {
    header("location:checkout.php");
}


ob_start();
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

        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb w3l-crumbs">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Dishes</li>
            </ol>

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="col-md-12">
                        <?php
                        $email = $_SESSION["email"];
                        include_once("connect.php");
                        $qu = mysqli_query($conn, "select * from cart where uname='$email'") or die(mysqli_error($conn));
                        if (mysqli_affected_rows($conn)) {
                            ?>
                            <table class="table table-stripped table-condensed" align='center'>
                                <tr>
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total Cost</td>
                                    <td>Delete</td>
                                </tr>
                        <?php
                        while ($ans = mysqli_fetch_array($qu)) {
                            print "<tr>
                                <td><img src='product/$ans[3]' width='75px' height='90px'></td>
                                <td>$ans[2]</td>
                                <td>$ans[4]</td>
                                <td>$ans[5]</td>
                                <td>$ans[6]</td>
                                <td><a class=\"btn btn-danger \" href='deletecart.php?id=$ans[0]'> <i class=\"fa fa-trash\"></i> Delete</a></td>
                            </tr>";
                        } ?>
                        </table>
                        <?php
                        } else {
                            print "<h3>No products are added in your cart</h3>";
                        }
                        ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?php
                                $qu = mysqli_query($conn, "select sum(totalcost) from cart where uname='$email'") or die(mysqli_error($conn));
                                $ans = mysqli_fetch_array($qu);
                                $tcost = ($ans[0]) ? $ans[0] : 0;
                                $deliveryCharges = calculateDeliveryCharges($tcost);

                                $finalCost = $tcost + $deliveryCharges;
                                $_SESSION["tcost"] = $finalCost;
                            ?>
                            <table class="table table-condensed table-stripped">
                                <tr>
                                    <th>Products Cost</th>
                                    <td>
                                        <?php echo formatCurrency($tcost);?>
                                    </td>
                                </tr>
                                <tr class="text-primary">
                                    <th>Delivery Charges</th>
                                    <td>
                                        <?php echo formatCurrency($deliveryCharges);?>
                                    </td>
                                </tr>
                                <tr class="text-success">
                                    <th>Total Cost</th>
                                    <td>
                                        <?php echo formatCurrency($tcost + $deliveryCharges);?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="col-md-12 text-right">
                            <form method="post">
                                <div class="btn-group">
                                    <input class="btn btn-success" type="submit" name="checkout" value="Checkout">
                                    <input class="btn btn-primary" type="submit" name="continue" value="Continue Shopping">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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
