<?php
ob_start();
session_start();
?>
<?php
include"connect.php";
if (isset($_POST["next"])) {
    $uname=$_SESSION["email"];
    $tcost=$_SESSION["tcost"];
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $pincode=$_POST["pincode"];
    $phone=$_POST["phone"];
    $status="Pending";
    include"connect.php";
    $query="insert into billinginfo(fname,lname,email,address,city,pincode,phone,totalcost,uname,status,delever_by)    values('$fname','$lname','$email','$address','$city','$pincode','$phone',$tcost,'$uname','$status','none')";
    $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        header("location:thanks.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sunny Side Up Bakery  | Products </title>
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
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Billing Info </li>
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
    <td rowspan="4"><form name="form1" method="post" action="">
      <table width="100%" border="0">
        <tr>
          <td height="35" colspan="2" class="style1"><p>BILLING INFORMATION</p></td>
        </tr>
        <tr>
          <td width="171" height="35">FIRST NAME</td>
          <td width="584" height="35"><label>
            <input type="text" name="fname" id="fname">
          </label></td>
        </tr>
        <tr>
          <td height="35">LAST NAME</td>
          <td height="35"><input type="text" name="lname" id="lname"></td>
        </tr>
        <tr>
          <td height="35">E-MAIL ADDRESS</td>
          <td height="35"><label>
            <input type="text" name="email" id="email">
          </label></td>
        </tr>
        <tr>
          <td height="35">ADDRESS</td>
          <td height="35"><label>
            <textarea name="address" id="address" cols="30" rows="5"></textarea>
          </label></td>
        </tr>
        <tr>
          <td height="35">CITY</td>
          <td height="35"><label>
            <input type="text" name="city" id="city">
          </label></td>
        </tr>
        <tr>
          <td height="35">PIN CODE</td>
          <td height="35"><label>
            <input type="text" name="pincode" id="pincode">
          </label></td>
        </tr>
        <tr>
          <td height="35">PHONE</td>
          <td height="35"><input type="text" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td height="35">&nbsp;</td>
            <td height="35">
                <label>
                    <input class="button-1" type="submit" name="next" id="next" value="NEXT" onClick="return abc()">
                </label>
            </td>
        </tr>
      </table>
    </form>
</td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr align="center">
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
