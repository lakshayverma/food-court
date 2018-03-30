<?php
require_once('includes/logic.php');

if (isset($_POST["s1"])) {
    $a = $_POST["name"];
    $b = $_FILES["image"]["name"];
    $c = $_FILES["image1"]["name"];
    include "connect.php";
    $query = "insert into addcategory(name,image,image1) values('$a','$b','$c')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    move_uploaded_file($_FILES["image"]["tmp_name"], "product/".$b);
    move_uploaded_file($_FILES["image1"]["tmp_name"], "product/".$c);
    $msg="Add Category";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo getSiteName(); ?>  | Sign Up </title>
<?php
include_once("files.php");
?>
</head>
<body>
    <!-- banner -->
    <div class="banner about-w3bnr">
        <?php
        include_once("adminheader.php");
        ?>

    </div>
    <!-- //banner -->
    <!-- breadcrumb -->
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Add Category</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- sign up-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Add Category</h3>
            <div class="login-agileinfo">
                <form name="abc" method="post" enctype="multipart/form-data">
                    <input class="agile-ltext" type="text" name="name" placeholder="Category Name" required><br/><br/>
                    <input class="agile-ltext" type="file" name="image" required>
                    <input class="agile-ltext" type="file" name="image1" required>
                    <input type="submit" value="Add Catgeory" name="s1">
                </form>
                <?php
                    if (isset($msg)) {
                        print $msg;
                    }
                ?>

            </div>
        </div>
    </div>
    <!-- //sign up-page -->
    <!-- subscribe -->
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
