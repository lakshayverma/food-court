<?php
require_once('includes/logic.php');
adminsOnly();
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
        if ($_SESSION["utype"]="admin") {
            include_once("adminheader.php");
        } else {
            include_once("header.php");
        }
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
                $qu=mysqli_query($conn, "select * from billinginfo") or die(mysqli_error($conn));
                if (mysqli_affected_rows($conn)>0) {
                    print "<table align='center' width='1200px'>
                        <tr bgcolor='#574C44' height='40px' >
                            <td><font color='#FFFFFF'>Bill Id</font></td>
                            <td><font color='#FFFFFF'>Name</font></td>
                            <td><font color='#FFFFFF'>Email</font></td>
                            <td><font color='#FFFFFF'>Phone No</font></td>
                            <td><font color='#FFFFFF'>City</font></td>
                            <td><font color='#FFFFFF'>Address</font></td>
                            <td><font color='#FFFFFF'>Total Cost</font></td>
                            <td><font color='#FFFFFF'>Current Status</font></td>
                            <td><font color='#FFFFFF'>Update Status</font></td>
                            <td><font color='#FFFFFF'>Deliver By</font></td>
                        </tr>
                    ";
                    $col=1;
                    while ($ans=mysqli_fetch_array($qu)) {
                        if ($col%2==0) {
                            print "<tr bgcolor='#F0F0F0' height='40px' style='border:1px solid black;color:black'>
                            <td><a href='vieworderproduct.php?id=$ans[0]'style='color:#000'>$ans[0]</a></td>
                            <td>$ans[1] $ans[2]</td>
                            <td>$ans[3]</td>
                            <td>$ans[7]</td>
                            <td>$ans[5]</td>
                            <td>$ans[4]</td>
                            <td>$ans[8]</td>
                            <td>$ans[10]</td>
                            <td><a href='updatestatus.php?id=$ans[0]' style='color:#000000'>Update</a></td>
                            <td>$ans[11]</td>
                        </tr>";
                        } else {
                            print "<tr bgcolor='#9B8B80'  height='40px' style='border:1px solid black;color:black'>
                            <td><a href='vieworderproduct.php?id=$ans[0]' style='color:#000'>$ans[0]</a></td>
                            <td>$ans[1] $ans[2]</td>
                            <td>$ans[3]</td>
                            <td>$ans[7]</td>
                            <td>$ans[5]</td>
                            <td>$ans[4]</td>
                            <td>$ans[8]</td>
                            <td>$ans[10]</td>
                            <td><a href='updatestatus.php?id=$ans[0]' style='color:#FFF'>Update</a></td>
                            <td>$ans[11]</td>
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
