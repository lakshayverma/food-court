<div class="header">
    <div class="w3ls-header"><!-- header-one -->
        <div class="container">
            <div class="w3ls-header-left">
                <p>Free home delivery at your doorstep For Above ₹300/-</p>
            </div>
            <div class="w3ls-header-right">
                <ul>
                    <li class="head-dpdn">
                        <a href="tel:+919041972991">
                            <i class="fa fa-phone" aria-hidden="true"></i> Call us: +919041972991
                        </a>
                    </li>
                    <li class="head-dpdn">
                        <?php
                        if (isset($_SESSION["email"])) {
                            echo '<a title="Click here to change Password" href="changepass.php"><i class="fa fa-user" aria-hidden="true"></i>Welcome ' . ucwords($_SESSION["name"]) . '</a></li>';
                        } else {
                            echo '<a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>Welcome Guest</a></li>';
                        }
                        ?>
                        <?php
                        if (isset($_SESSION["email"])) :
                            echo '<li class="head-dpdn">
								<a href="showcart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
							</li>';
                        else :
                            echo '<li class="head-dpdn">
								<a href="signup.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</a>
                            </li>';
                        endif;
                        ?>
                        <?php
                        if (isset($_SESSION["email"])) :
                            echo '<li class="head-dpdn">
								<a href="signout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a>
							</li>';
                        else :
                            echo '<li class="head-dpdn">
								<a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                            </li>';
                        endif;
                        ?>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //header-one -->
    <!-- navigation -->
    <div class="navigation agiletop-nav">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header w3l_logo">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a href="index.php">Staple<span>Best Food Collection</span></a></h1>
                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <!-- Mega Menu -->
                        <li class="dropdown">
                            <a href="product.php" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6><a href="category.php">Food type</a></h6>
                                            <?php
                                            include_once("connect.php");
                                            $qu = "select * from addcategory order by rand() limit 4";
                                            $res = mysqli_query($conn, $qu) or die(mysqli_error($conn));
                                            while ($ans = mysqli_fetch_array($res)) {
                                                echo "<li><a href='subcategory.php?catid=$ans[0]'>$ans[1]</a></li>";
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6><a href="allcuisine.php">Cuisine</a></h6>
                                            <?php
                                            include_once("connect.php");
                                            $qu = "select * from cuisine order by rand() limit 4";
                                            $res = mysqli_query($conn, $qu) or die(mysqli_error($conn));
                                            while ($ans = mysqli_fetch_array($res)) {
                                                echo "<li><a href='product.php?cuid=$ans[0]'>$ans[1]</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="search.php">Search</a></li>
                        <li class="w3pages"><a href="contact.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact Us<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="feedback.php">Feedback</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
    <!-- //navigation -->
</div>
