<?php
session_start();
if (isset($_POST["s1"])) {
    include "connect.php";
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    $q="insert into feedback(name,email,message) values('$name','$email','$message')";
    $result=mysqli_query($conn, $q) or die(mysqli_error($conn));

    $msg="THANKYOU FOR YOUR FEEDBACK";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Staple Food a Restaurants Category Bootstrap Responsive website Template | Login :: w3layouts</title>
<?php
include_once("files.php");
?></head>
<body>
    <!-- banner -->
    <div class="banner about-w3bnr">
        <!-- header -->
        <?php
        include_once("header.php");
        ?>
        <!-- //header-end -->
        <!-- banner-text -->
        <?php
        include_once("banner.php");
        ?>
    </div>
    <!-- //banner -->
    <!-- breadcrumb -->
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">feedback</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- login-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Feedback</h3>
            <div class="login-agileinfo">
                <form name="abc" method="post">
                    <p>
                      <input class="agile-ltext" type="text" name="name" placeholder="Name" required>
                      <input class="agile-ltext" type="text" name="email" placeholder="E-mail" required>
                  </p>
                  <p>&nbsp;</p>
                    <p>
                      <textarea name="message" cols="60" rows="5" required class="agile-ltext" placeholder="Message"></textarea>
                  </p>
                    <div class="wthreelogin-text">
                        <ul>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="SUBMIT" name="s1">
                    <input type="reset" value="Reset" name="s1">
                </form>
                 <?php
                 if (isset($msg)) {
                     print $msg;
                 }
                 ?>
            </div>
        </div>
    </div>
    <!-- //feedback-page -->
    <!-- subscribe --><!-- //subscribe -->
    <!-- footer -->
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
