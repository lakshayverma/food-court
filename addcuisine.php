<?php
require_once('includes/logic.php');

if (isset($_POST["s1"])) {
    include "connect.php";
    $name=$_POST["Cuisine"];
    $cu=$_FILES["cu"]["name"];
    $cu2=$_FILES["cu2"]["name"];
    $q = "insert into cuisine(name,cuimage,cuimage1) values('$name','$cu','$cu2')";
    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
    move_uploaded_file($_FILES["cu"]["tmp_name"], "product/$cu");
    move_uploaded_file($_FILES["cu2"]["tmp_name"], "product/$cu2");
    mysqli_close($conn);
    $msg = "Cuisine Added Successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo getSiteName(); ?>  | Login </title>
<?php
include_once("files.php");
?></head>
<body>
    <!-- banner -->
    <div class="banner about-w3bnr">
        <!-- header -->
        <?php
        include_once("adminheader.php");
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
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">feedback</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- login-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Add Cuisine</h3>
            <div class="login-agileinfo">
                <form method="post" enctype="multipart/form-data" name="abc">
                    <p>
                      <input class="agile-ltext" type="text" name="Cuisine" placeholder="Cuisine" required>
                  </p>


                    <div class="wthreelogin-text">
                        <ul>
                            <li>

                              <input type="file" name="cu" id="cu">
                            </li>
                            <br/><br/>
                            <li>
                              <input type="file" name="cu2" id="cu2">
                          </li>
                            <li></li>
                        </ul>
                        <div class="clearfix"> </div>
                  </div>
                    <input type="submit" value="SUBMIT" name="s1">
                </form>
                <?php
                if (isset($msg)) {
                    echo $msg;
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
