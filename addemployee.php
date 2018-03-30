<?php
require_once('includes/logic.php');
ob_start();
?>

<?php
if (isset($_POST["s1"])) {
    if (isset($_POST["c1"])) {
        $name=$_POST["name"];
    }
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $cpass=$_POST["cpass"];
    $phno=$_POST["phno"];
    if ($pass==$cpass) {
        include "connect.php";
        $query="insert into signup(name,email,pass,phno,utype) values('$name','$email','$pass','$phno','employee')";
        $result=mysqli_query($conn, $query) or die(mysqli_error($conn));

        $msg="add employee SUCCESSFULLY";
    } else {
        $msg="Password Mismatch";
    }
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
        <?php
        include_once("banner.php");
        ?>
    </div>
    <!-- //banner -->
    <!-- breadcrumb -->
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">add employee</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- sign up-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Add Employee</h3>
            <div class="login-agileinfo">
                <form name="abc" method="post">
                    <input class="agile-ltext" type="text" name="name" placeholder="Username" required>
                    <input class="agile-ltext" type="email" name="email" placeholder="Your Email" required>
                    <input class="agile-ltext" type="password" name="pass" placeholder="Password" required>
                    <input class="agile-ltext" type="password" name="cpass" placeholder="Confirm Password" required>
                    <input class="agile-ltext" type="text" name="phno" placeholder="Phone No" required>
                    <div class="wthreelogin-text">

                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="add employee" name="s1">
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
    <div class="subscribe agileits-w3layouts">
        <div class="container">
            <div class="col-md-6 social-icons w3-agile-icons">
                <h4>Keep in touch</h4>
                <ul>
                    <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                    <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                    <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                    <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                    <li><a href="#" class="fa fa-rss icon rss"> </a></li>
                </ul>
                <ul class="apps">
                    <li><h4>Download Our app : </h4> </li>
                    <li><a href="#" class="fa fa-apple"></a></li>
                    <li><a href="#" class="fa fa-windows"></a></li>
                    <li><a href="#" class="fa fa-android"></a></li>
                </ul>
            </div>
            <div class="col-md-6 subscribe-right">
                <h3 class="w3ls-title">Subscribe to Our <br><span>Newsletter</span></h3>
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="Enter your Email..." required>
                    <input type="submit" value="Subscribe">
                    <div class="clearfix"> </div>
                </form>
                <img src="images/i1.png" class="sub-w3lsimg" alt=""/>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
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
