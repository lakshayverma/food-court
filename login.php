<?php
session_start();
if (isset($_POST["s1"])) {
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];
    require_once("connect.php");
    $query="select * from signup where email='$uname' and pass='$pass'";
    $res=mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows=mysqli_affected_rows($conn);
    if ($rows==1) {
        $res=mysqli_fetch_array($res);
        $_SESSION["name"]=$res[0];
        $_SESSION["email"]=$res[1];
        $_SESSION["utype"]=$res[4];
        if ($res[4]=="admin") {
            header("location:admin.php");
        } elseif ($res[4]=="employee") {
            header("location:vieworder.php");
        } else {
            if (isset($_GET["pid"])) {
                header("location:productdetails.php?pid=".$_GET["pid"]);
            } elseif (isset($_GET["cuid"])) {
                header("location:combo.php?cuid=".$_GET["cuid"]);
            } else {
                header("location:index.php");
            }
        }
    } else {
        $msg="Wrong Username and password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sunny Side Up Bakery  | Login </title>
<?php
include_once("files.php");
?>
<script>
function abc()
{
    if(document.form-login.uname.value.length<=5)
    {
        alert("Minimum length for user name is 5 characters")
        return false;
    }
    if(document.form-login.pass.value.length<=2)
    {
        alert("Please enter password")
        return false;
    }
}

</script></head>
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
            <li class="active">Login</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- login-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
        <h3><?php
        if (isset($_GET["pid"]) || isset($_GET["cuid"])) {
            print "if u want to order then plz login first";
        }
        ?></h3>
            <h3 class="w3ls-title w3ls-title1">Login to your account</h3>
            <div class="login-agileinfo">
                <form name="form-login" method="post">
                    <input class="agile-ltext" type="text" name="uname" placeholder="Username">
                    <input class="agile-ltext" type="password" name="pass" placeholder="Password">
                    <div class="wthreelogin-text">
                        <ul>
                            <li>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                    <span> Remember me ?</span>
                                </label>
                            </li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" value="LOGIN" name="s1" onClick="return abc()">
                </form>
                <p>Don't have an Account? <a href="signup.php"> Sign Up Now!</a></p>
            </div>
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
