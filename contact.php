<?php
require_once('includes/logic.php');

if (isset($_POST["s1"])) {
    include "connect.php";
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    $q="insert into contactus(name,email,message) values('$name','$email','$message')";
    $result=mysqli_query($conn, $q) or die(mysqli_error($conn));
    
$msg="Thank you for contacting us";
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo getSiteName(); ?>  | Contact Us </title>
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
            <li class="active">Contact Us</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- contact -->
    <div id="contact" class="contact cd-section">
        <div class="container">
            <h3 class="w3ls-title">Contact us</h3>
            <div class="contact-row agileits-w3layouts">
                <div class="col-xs-6 col-sm-6 contact-w3lsleft">
                    <div class="contact-grid agileits">
                        <h4>Please send your message </h4>
                        <form method="post">
                            <input type="text" name="name" placeholder="Name" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <textarea name="message" placeholder="Message..." required></textarea>
                            <input type="submit" name="s1" value="Submit" >
                        </form>
                        <?php
                        if (isset($msg)) {
                            echo "<script type='text/javascript'>alert('{$msg}');</script>"; 
                        }
                       


                        ?>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 contact-w3lsright">

                    <div class="address-row">
                        <div class="col-xs-2 address-left">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-10 address-right">
                            <h5>Visit Us</h5>
                            <p>House No 8, Jalandhar Cantt, Punjab 144005</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="address-row w3-agileits">
                        <div class="col-xs-2 address-left">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-10 address-right">
                            <h5>Mail Us</h5>
                            <p><a href="mailto:info@example.com"> www.staple@corner.com</a></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="address-row">
                        <div class="col-xs-2 address-left">
                            <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-10 address-right">
                            <h5>Call Us</h5>
                            <p>+91 904 197 2991</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- map -->
        <div class="map agileits">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.948805392833!2d-73.99619098458929!3d40.71914347933105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1479793484055"></iframe>
        </div>
        <!-- //map -->
    </div>
    <!-- //contact -->
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
