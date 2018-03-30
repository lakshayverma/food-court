<?php
require_once('includes/logic.php');
usersOnly();

if (isset($_POST["s1"])) {
    $email=$_SESSION["email"];
    include"connect.php";
    $a=$_POST["cpass"];
    $b=$_POST["npass"];
    $c=$_POST["conpass"];
    $qu=mysqli_query($conn, "update signup set pass='$b' where email='$email' and pass='$a'") or die(mysqli_error($conn));
    $msg="Password Changed Successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo getSiteName(); ?>  | Change Password </title>
<?php
include_once("files.php");
?>
<script>
$(document).ready(function(e) {
    $("#cat").change(function(){
        var a=$("#cat").val()
            $.ajax({
                url:"ajax.php",
                type:"POST",
                data:{"cat":a},
                beforeSend: function()
                {
                    $("#pre").html("Loding")
                },
                success: function(result)
                {
                    $("#pre").html("")
                    $("#subcat").html(result)
                },
                error:function()
                {
                    alert("error in ajax")
                }

                })

        })
});
</script>
</head>
<body>
    <!-- banner -->
    <div class="banner about-w3bnr">
        <?php
        if ($_SESSION["utype"]=="admin") {
            include_once("adminheader.php");
        } else {
            include_once("header.php");
        }
        ?>

    </div>
    <!-- //banner -->
    <!-- breadcrumb -->
    <div class="container">
        <ol class="breadcrumb w3l-crumbs">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Add SubCategory</li>
        </ol>
    </div>
    <!-- //breadcrumb -->
    <!-- sign up-page -->
    <div class="login-page about">
        <img class="login-w3img" src="images/img3.jpg" alt="">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Change Password</h3>
            <div class="login-agileinfo">
                <form name="abc" method="post" enctype="multipart/form-data"><div id="pre">
                  <input class="agile-ltext" type="text" name="cpass" placeholder="Current Password" required>
                    <input class="agile-ltext" type="text" name="npass" placeholder="New Password" required>
                    <input class="agile-ltext" type="text" name="conpass" placeholder="Confirm Password" required><br/>
                    <input type="submit" value="Change Password" name="s1">
                </div>
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
