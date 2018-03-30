<?php
require_once('includes/logic.php');

ob_start();
include_once("connect.php");
$orderPlacedBy = $_SESSION["email"];
$qu = mysqli_query($conn, "select * from billinginfo where uname='$orderPlacedBy' order by bill_id desc") or die(mysqli_error($conn));

$billingInformation = mysqli_fetch_array($qu);

$qu=mysqli_query($conn, "select * from cart where uname='$orderPlacedBy'") or die(mysqli_error($conn));
while ($productInCart = mysqli_fetch_array($qu)) {
    $qu2="insert into orderhistory (billid,pid,pname,image,price,qty,tcost,uname) values($billingInformation[0],$productInCart[1],'$productInCart[2]','$productInCart[3]','$productInCart[4]','$productInCart[5]','$productInCart[6]','$productInCart[7]')";
    mysqli_query($conn, $qu2) or die(mysqli_error($conn));
}

$qu3=mysqli_query($conn, "delete from cart where uname='$orderPlacedBy'") or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo getSiteName(); ?>  | Products </title>
<style type="text/css">
.style1 {font-size: xx-large}
.style2 {color: #EE7506}
</style>
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
    <table width="100%" border="0" cellpadding="0">
    <tr>
        <td>&nbsp;</td>
        <td><h4>Thanks for order</h4> </td>
        <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td width='15%'>&nbsp;</td>
    <td align="left"><h3><font color="#FF0000">Your Order is placed at order id:<?php print $billingInformation[0];?></font></h3></td>
    <td width="15%">&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><h3><font color="#FF0000">Grand Tota:Rs. <?php print $billingInformation[8];?>/-</font></h3></td>
      <td></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td><b>Their are following Product you order:</b></td>
    <td>

    </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>
    <?php
    $qu234=mysqli_query($conn, "select * from orderhistory where billid=$billingInformation[0]") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        print "<table width='800px' align='center'>
            <tr bgcolor='#574C44' height='40px'>
                <td><font color='#FFFFFF'>Image</font></td>
                <td><font color='#FFFFFF'>Name</font></td>
                <td><font color='#FFFFFF'>Price</font></td>
                <td><font color='#FFFFFF'>Quantity</font></td>
                <td><font color='#FFFFFF'>Total cost</font></td>
            </tr>";
        $co=1;
        while ($an=mysqli_fetch_array($qu234)) {
            if ($co%2==0) {
                print "<tr bgcolor='#D1BDBA'>
                        <td><img src='product/$an[4]' width='75px' height='90px'></td>
                        <td>$an[3]</td>
                        <td>$an[5]</td>
                        <td>$an[6]</td>
                        <td>$an[7]</td>
                    </tr>";
            } else {
                print "<tr bgcolor='#EC665B'>
                        <td><img src='product/$an[4]' width='75px' height='90px'></td>
                        <td>$an[3]</td>
                        <td>$an[5]</td>
                        <td>$an[6]</td>
                        <td>$an[7]</td>
                    </tr>";
            }
            $co++;
        }
        print "</table>";
    } else {
        print "";
    }

    ?>
    </td>
    <td>&nbsp;</td>
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
