<div class="col-md-3 rsidebar">
    <div class="rsidebar-top">
        <div class="slider-left">
            <h4>Our Categories</h4>
            <div class="row row1 scroll-pane">
                <ul>
                <?php
                include_once("connect.php");
                $qu = mysqli_query($conn, "select * from addcategory") or die(mysqli_error($conn));
                while ($ans=mysqli_fetch_array($qu)) {
                    print "<li><a href='subcategory.php?catid=$ans[0]'>$ans[1]</a></li>";
                }
                ?>
                </ul>
            </div>
        </div>

        <div class="sidebar-row">
            <h4>All Cuisine</h4>
            <ul>
                <?php
                include_once("connect.php");
                $qu="select * from cuisine";
                $res = mysqli_query($conn, $qu) or die(mysqli_error($conn));
                while ($ans=mysqli_fetch_array($res)) {
                    print "<li><a href='product.php?cuid=$ans[0]'>$ans[1]</a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
