<?php
include "connect.php";
$catid=$_GET["id"];
$qu="select * from addsubcategory where cid=$catid";
$res=mysqli_query($conn,$qu) or die(mysqli_error($conn));
$catinfo=mysqli_fetch_array($res);
if(isset($_POST["s1"]))
{
	$cat=$_POST["cat"];
	$a=$_POST["name"];
	if($_FILES["image"]["tmp_name"]==4)
	{
		$b=$catinfo[3];
		print $b;
	}
	else
	{
		$b=$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"],"product/".$b);
	}
	if($_FILES["image1"]["tmp_name"]==4)
	{
		$c=$catinfo[4];	
		print $c;
	}
	else
	{
		$c=$_FILES["image1"]["name"];
		move_uploaded_file($_FILES["image1"]["tmp_name"],"product/".$c);
	}
	$query="update addsubcategory set category='$cat',name='$a',image='$b',image1='$c' where cid=$catid";
	$result=mysqli_query($conn,$query);
	mysqli_close($conn);
	//header("location:vsubcat.php");
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Staple Food a Restaurants Category Bootstrap Responsive website Template | Sign Up :: w3layouts</title>
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
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Add Category</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Update SubCategory</h3>  
			<div class="login-agileinfo"> 
				<form name="abc" method="post" enctype="multipart/form-data"> 
					<select name="cat">
                    	<option>Choose Category</option>
                        <?php
							include"connect.php";
							$q="select id,name from addcategory";
							$r=mysqli_query($conn,$q);
							while($a=mysqli_fetch_array($r))
							{
								if($catinfo[1]==$a[0])
								{
									print"<option value='$a[0]' selected>$a[1]</option>";
								}
								else
								{
									print"<option value='$a[0]'>$a[1]</option>";
								}
							}
		  			?>
                    </select><br/><br/>
                    <input class="agile-ltext" type="text" name="name" value="<?php print $catinfo[2]?>" placeholder="Category Name" required><br/><br/>
                    <?php
                    print "<img src='product/$catinfo[3]' width='75px' height='75px'>";
					?>
                    <input class="agile-ltext" type="file" name="image" ><br>
                    <?php
                    print "<img src='product/$catinfo[4]' width='75px' height='75px'>";
					?>
                    <input class="agile-ltext" type="file" name="image1" >
					  
					<input type="submit" value="Update SubCatgeory" name="s1">
				</form>
                <?php
					if(isset($msg))
						print $msg;
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