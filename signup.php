<?php
require_once('includes/logic.php');

guestsOnly();

if (isset($_POST["s1"])) {
    if (isset($_POST["c1"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
        $phno = $_POST["phno"];
        $_SESSION['name1'] = $_POST['name'];
        $_SESSION['email1'] = $_POST['email'];
        $_SESSION['phno1'] = $_POST['phno'];

        if ($pass == $cpass) {
            include "connect.php";
            $emailCheck = "SELECT * FROM signup WHERE email='$email'";
            $checkEmail =  mysqli_query($conn, $emailCheck) or die(mysqli_error($conn));
            if (!$checkEmail->num_rows == 0) {
                $msg2 = "Email Already Exist<br>";
            }
            $usernameCheck = "SELECT * FROM signup WHERE name='$name'";
            $checkUsername =  mysqli_query($conn, $usernameCheck) or die(mysqli_error($conn));  
            if (!$checkUsername->num_rows == 0) {
                $msg1 = "Username Already Exist";
            }             
            if ($checkEmail->num_rows == 0 && $checkUsername->num_rows == 0) {
                        $query = "insert into signup(name,email,pass,phno,utype) values('$name','$email','$pass','$phno','normal')";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        mysqli_close($conn);

                        $_SESSION["name"] = $name;
                        $_SESSION["email"] = $email;
                        $_SESSION["utype"] = "normal";

                        header("location:index.php");
                        $msg = "SIGNED UP SUCCESSFULLY";
                }
        } else {
            $msg3 = "Passwords Mismatch";
        }
    } else {
        $msg4 = "<br>Please accept our Terms of Service before continuing";
    }
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo getSiteName(); ?>  | Sign Up</title>
        <?php include_once("files.php"); ?>
        <script type="text/javascript">
            function abc()
            {
                if (document.form1.name.value.length <= 5)
                {
                    alert("plz fill proper name")
                    return false;
                }
                if (document.form1.email.value.length <= 5 || document.form1.email.value.indexOf("@") < 3 || document.form1.email.value.indexOf(".") < 4)
                {
                    alert("Pill fill proper email address")
                    return false;
                }

                if (document.form1.pass.value.length < 8)
                {
                    alert("Please enter password of 8 characher")
                    return false;
                }
                var p1 = document.form1.pass.value;
                var p2 = document.form1.cpass.value;
                if (p1 != p2)
                {
                    alert("Password mismatch")
                    return false;
                }
                if (document.form1.phno.value.length != 10)
                {
                    alert("Please enter proper phone no")
                    return false;
                }
                var pr = /^[0-9]$/
                if (document.form1.phno.value.match(pr))
                {
                    alert("Phone Accept digit only")
                    return false;
                }
            }
        </script>
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
                <li class="active">Sign Up</li>
            </ol>
        </div>
        <!-- //breadcrumb -->
        <!-- sign up-page -->
        <div class="login-page about">
            <img class="login-w3img" src="images/img3.jpg" alt="">
            <div class="container">
                <h3 class="w3ls-title w3ls-title1">Sign Up to your account</h3>
                <div class="login-agileinfo">
                    <form name="form1" method="post">
                        <input class="agile-ltext" type="text" name="name" placeholder="Username" value="<?php if(isset($_SESSION['name1'])){echo $_SESSION['name1'];}else{echo "";} ?>"> 
                        <?php if (isset($msg1)) {
                            echo $msg1;
                        } ?>
                        <input class="agile-ltext" type="email" name="email" placeholder="Your Email"  value="<?php if(isset($_SESSION['email1'])){echo $_SESSION['email1'];}else{echo "";} ?>">
                         <?php if (isset($msg2)) {
                            echo $msg2;
                        } ?>
                        <input class="agile-ltext" type="password" name="pass" placeholder="Password">
                        <?php if (isset($msg3)) {
                            echo $msg3;
                        } ?>
                        <input class="agile-ltext" type="password" name="cpass" placeholder="Confirm Password">
                        <input class="agile-ltext" type="text" name="phno" placeholder="Phone No"  value="<?php if(isset($_SESSION['phno1'])){echo $_SESSION['phno1'];}else{echo "";} ?>">
                        <div class="wthreelogin-text" style="display:none" >
                            <ul>
                                <li>
                                    <label class="checkbox"><input type="checkbox" name="c1" checked><i></i>
                                        <span> I agree to the terms of service</span>
                                    </label>
                                </li>
                      <?php if (isset($msg4)) {
                            echo $msg4;
                        } ?>
                            </ul>
                            <div class="clearfix"> </div>
                        </div>
                        <input type="submit" value="Sign Up" name="s1" ">
                    </form>
                    <p>Already have an account?  <a href="login.php" > Login Now!</a></p>
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
                        jQuery(document).ready(function ($) {
                            $(".scroll").click(function (event) {
                                event.preventDefault();

                                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                            });
                        });
        </script>
        <!-- //end-smooth-scrolling -->
        <!-- smooth-scrolling-of-move-up -->
        <script type="text/javascript">
            $(document).ready(function () {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear'
                 };
                 */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <!-- //smooth-scrolling-of-move-up -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.js"></script>
    </body>
</html>

<?php
mysqli_close($conn);
?>
