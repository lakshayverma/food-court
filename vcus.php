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
        include_once("adminheader.php");
        ?>
        <!-- //header-end -->
    <!-- banner-text --></div>
    <!-- //banner -->
    <!-- add-products --><!-- //add-products -->
    <!-- order -->
    <div class="wthree-order">
            <div class="order-agileinfo">
                <?php
                include_once("connect.php");
                $qu=mysqli_query($conn, "select * from cuisine") or die(mysqli_error($conn));
                if (mysqli_affected_rows($conn)>0) {
                    print "<table align='center' width='800px'>
                        <tr bgcolor='#574C44'>
                            <td><font color='#FFFFFF'>Cuisine Image</font></td>
                            <td><font color='#FFFFFF'>Cuisine Name</font></td>
                            <td><font color='#FFFFFF'>Update</font></td>
                            <td><font color='#FFFFFF'>Delete</font></td>
                        </tr>
                    ";
                    $col=1;
                    while ($ans=mysqli_fetch_array($qu)) {
                        if ($col%2==0) {
                            print "<tr bgcolor='#D1BDBA'>
                            <td><img src='product/$ans[2]' width='90px' height='90px'></td>
                            <td>$ans[1]</td>
                            <td><a href='updatecu.php?id=$ans[0]' style='color:#FFF'>Update</a></td>
                            <td><a href='deletecu.php?id=$ans[0]' style='color:#FFF'>Delete</a></td>
                        </tr>";
                        } else {
                            print "<tr bgcolor='#EC665B'>
                            <td><img src='product/$ans[2]' width='90px' height='90px'></td>
                            <td>$ans[1]</td>
                            <td><a href='updatecu.php?id=$ans[0]' style='color:#FFF'>Update</a></td>
                            <td><a href='deletecu.php?id=$ans[0]' style='color:#FFF'>Delete</a></td>
                        </tr>";
                        }
                        $col++;
                    }
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
