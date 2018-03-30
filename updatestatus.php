<?php
session_start();
$a=$_GET["id"];
include "connect.php";
$qu=mysqli_query($conn, "select * from billinginfo where bill_id=$a") or die(mysqli_error($conn));
$bilinfo=mysqli_fetch_array($qu);
if (isset($_POST["s1"])) {
    $uname=$_SESSION["email"];
    $st=$_POST["st"];
    $qu1=mysqli_query($conn, "update billinginfo set status='$st',delever_by='$uname' where bill_id=$a") or die(mysqli_error($conn));
    $r=mysqli_affected_rows($conn);
    header("location:vieworder.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sunny Side Up Bakery  | Sign Up </title>
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
    <!-- breadcrumb -->
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Status update</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- sign up-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Update Status</h3>
            <div class="login-agileinfo">
                <form name="abc" method="post" enctype="multipart/form-data">
                    <input class="agile-ltext" type="text" name="Bill Id" value="<?php print $bilinfo[0]?>" placeholder="Category Name" required><br/><br/>
                    <select name="st">
                    <option>Pending</option>
                    <option>Deliver</option>
                    </select>
                    <input type="submit" value="Update Status" name="s1">
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
