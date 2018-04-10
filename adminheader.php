<div class="header">
    <div class="w3ls-header"><!-- header-one -->
        <div class="container">
            <div class="w3ls-header-left">
                <p>Free home delivery at your doorstep For Above $30</p>
            </div>
            <div class="w3ls-header-right">
                <ul>
                    <li class="head-dpdn">
                        <i class="fa fa-phone" aria-hidden="true"></i> Call us: +919041972991
                    </li>
                    <li class="head-dpdn">
                        <?php
                        if (isset($_SESSION["email"])) {
                            echo '<a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>Welcome ' . ucwords($_SESSION["name"]) . '</a></li>';
                        } else {
                            echo '<a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>Welcome Guest</a></li>';
                        }
                        ?>
                        <?php
                        if (isset($_SESSION["email"])) {
                            echo '<li class="head-dpdn">
								<a href="changepass.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Change Password</a>
							</li>';
                        } else {
                            echo '<li class="head-dpdn">
								<a href="signup.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</a>
							</li>';
                        }
                        ?>
                        <?php
                        if (isset($_SESSION["email"])) {
                            echo '<li class="head-dpdn">
								<a href="signout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a>
							</li>';
                        } else {
                            echo '<li class="head-dpdn">
								<a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
							</li>';
                        }
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
                        <li><a href="admin.php">Admin</a></li>
                        <!-- Mega Menu -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6>Add Content</h6>
                                            <li><a href="addcat.php">Add Category</a></li>
                                            <li><a href="addsubcat.php">Add Subcategory</a></li>
                                            <li><a href="addcuisine.php">Add Cuisine</a></li>
                                            <li><a href="addprod.php">Add Product</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            <h6>View Content</h6>
                                            <li><a href="vcat.php">View Catgeory</a></li>
                                            <li><a href="vsubcat.php">View Subcategory</a></li>
                                            <li><a href="vcus.php">View Cuisine</a></li>
                                            <li><a href="vprod.php">View Product</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="vieworder.php">View Order</a></li>
                        <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="viewfeebback.php">Feedback</a></li>
                                <li><a href="viewcontact.php">Contact</a></li>
                            </ul>
                        </li>
                      
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- //navigation -->
</div>
