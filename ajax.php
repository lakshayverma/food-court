<?php
$a=$_POST["cat"];
							include"connect.php";
							$q="select cid,name from addsubcategory where category=$a";
							$r=mysqli_query($conn,$q) or die(mysqli_error($conn));
							if(mysqli_affected_rows($conn)>0)
							{
								print "<option>Choose Subcategory</option>";
								while($a=mysqli_fetch_array($r))
								{
									
									print"<option value=$a[0]>$a[1]</option>";
								}
							}
							else
							{
								print "<option>No Subcategory Available</option>";
							}
?>