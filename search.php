<?php
ob_start();
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

    <div class="products">
        <div class="container">
            <table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="20%">&nbsp;</td>
    <td align="center">
    <div class="agileits_search">
                    <form action="" method="post">
                        <input name="search" type="text" placeholder="Enter Dish Name" required>

                        <input type="submit" value="Search" name="s1">
                    </form>
                    <?php
                    if (isset($_POST["s1"])) {
                        $a=$_POST["search"];
                        header("location:product.php?sname=$a");
                    }
                    ?>
                </div>

    </td>
    <td width="20%">&nbsp;</td>
  </tr>
</table>

            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //products -->

    <!-- dishes -->

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
