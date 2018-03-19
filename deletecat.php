<?php
$a=$_GET["id"];
include_once("connect.php");
$qu="delete from addcategory where id=$a";
mysqli_query($conn,$qu) or die(mysqli_error($conn));
header("location:vcat.php");

?>