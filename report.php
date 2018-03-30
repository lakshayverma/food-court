<?php
require_once('includes/logic.php');
include"connect.php";

$products = [];

$sql = "SELECT pid, sum(qty) orders_qty FROM `orderhistory` group by orderhistory.pid order by orders_qty desc limit 10";
$result=mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $query2 = 'select * from product where pid='.$row['pid'];
    $result2 = mysqli_query($conn, $query2);

    if ($result2) {
        $ds = mysqli_fetch_assoc($result2);
        $products[] = array_merge($row, $ds);
    }
}

ob_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo getSiteName(); ?>  | Top 10 Products </title>
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
        </div>
        <!-- //banner -->

        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb w3l-crumbs">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                <?php
                if (isUser('admin')) {
                    ?>
                <li><a href="admin.php"><i class="fa fa-user"></i>Admin</a></li>
                <?php
                }
                ?>
                <li class="active">Report</li>
            </ol>

            <div class="row">
                <div class="col-md-12">
                    <h3>Most Popular Products Top 10</h3>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-header">
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity Ordered</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                                foreach($products as $product) {
                                    echo '<tr>';
                                    echo '<td>' . "<img src='product/{$product['image']}' height='90px'>" . '</td>';
                                    echo '<td>' . $product['name'] . '</td>';
                                    echo '<td>' . $product['orders_qty'] . '</td>';

                                    echo '</tr>';
                                }

                                ?>
                            </tbody>
                        </table>
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
                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
