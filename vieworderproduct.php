<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sunny Side Up Bakery  | Home </title>
<?php
include_once("files.php");
?>
<style>
    table.table tbody tr {
        background: #0b0e17;
    }
    table.table tbody tr:nth-child(odd) {
        background: #11111d;
    }

    td {
        color: black;
    }

</style>
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
    </div>
    <!-- //banner -->
    <!-- add-products --><!-- //add-products -->
    <!-- order -->
    <div class="wthree-order">
        <div class="order-agileinfo">
            <?php
            include_once("connect.php");
            $a=$_GET["id"];
            $qu=mysqli_query($conn, "select * from orderhistory where billid=$a") or die(mysqli_error($conn));
            if (mysqli_affected_rows($conn)>0) {
                print "<table class=\"table table-stripped table-responsive text-center\" >
                    <thead>
                    <tr bgcolor='#574C44' height='40px'>
                        <th><font color='#FFFFFF'>Image</font></th>
                        <th><font color='#FFFFFF'>Product Name</font></th>
                        <th><font color='#FFFFFF'>Price</font></th>
                        <th><font color='#FFFFFF'>Quantity</font></th>
                        <th><font color='#FFFFFF'>Total Cost</font></th>
                    </tr>
                    </thead>
                ";
                $col=1;
                print '<tbody>';
                while ($ans=mysqli_fetch_array($qu)) {
                    print "<tr>
                        <td><img src='product/$ans[4]' width='50px' height='50px'></td>
                        <td>$ans[3]</td>
                        <td>$ans[5]</td>
                        <td>$ans[6]</td>
                        <td>$ans[7]</td>
                    </tr>";
                    // if ($col%2==0) {
                    // } else {
                    //   // other option #D1BDBA
                    //     print "<tr bgcolor='#EC665B' height='40px'>
                    //     <td><img src='product/$ans[4]' width='50px' height='50px'></td>
                    //     <td>$ans[3]</td>
                    //     <td>$ans[5]</td>
                    //     <td>$ans[6]</td>
                    //     <td>$ans[7]</td>
                    //     </tr>";
                    // }
                    $col++;
                }
                print '</tbody>';
                print "</table>";
            } else {
                print "No catgeory available";
            }
            ?>
            <div class="clearfix"> </div>
            <br/>
            <br/>
            <!-- //order -->
            <!-- deals --><!-- //deals -->
            <!-- dishes --><!-- //dishes -->
            <!-- subscribe --><!-- //subscribe -->
            <!-- footer -->
        </div>
    </div>


    <?php
    include_once("footer.php");
    ?>
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
